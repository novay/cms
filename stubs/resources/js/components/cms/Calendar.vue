<template>
    <div class="calendar-container">
      <div class="calendar">
        <FullCalendar
          :events="events"
          @dateClick="handleDateClick"
          @eventClick="handleEventClick"
          initialView="dayGridMonth"
          :editable="true"
          :selectable="true"
        />
      </div>
      <div class="event-form" v-if="showForm">
        <h3>{{ isEditing ? 'Edit Event' : 'Add Event' }}</h3>
        <div>
          <label for="title">Title:</label>
          <input type="text" id="title" v-model="form.title" />
        </div>
        <div>
          <label for="start">Start Date:</label>
          <input type="date" id="start" v-model="form.start" />
        </div>
        <div>
          <label for="end">End Date:</label>
          <input type="date" id="end" v-model="form.end" />
        </div>
        <div>
          <button @click="saveEvent">{{ isEditing ? 'Update' : 'Save' }}</button>
          <button v-if="isEditing" @click="deleteEvent">Delete</button>
          <button @click="cancelForm">Cancel</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
 import FullCalendar from '@fullcalendar/vue3'; // Vue 3 component
import dayGridPlugin from '@fullcalendar/daygrid'; // Plugin dayGrid untuk tampilan bulanan
import interactionPlugin from '@fullcalendar/interaction'; // Plugin untuk event klik dan drag

export default {
  components: { FullCalendar },
  data() {
    return {
      events: [],
      showForm: false,
      isEditing: false,
      selectedEvent: null,
      form: {
        title: '',
        start: '',
        end: ''
      },
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin], // Pastikan plugins dimasukkan di sini
        initialView: 'dayGridMonth',
        events: this.events,
        selectable: true,
        editable: true,
      }
    };
  },
  methods: {
    fetchEvents() {
      axios.get('/api/events').then((response) => {
        this.events = response.data;
      });
    },
    handleDateClick(info) {
      this.form = { title: '', start: info.dateStr, end: info.dateStr };
      this.isEditing = false;
      this.showForm = true;
    },
    handleEventClick(info) {
      this.selectedEvent = info.event;
      this.form = {
        title: this.selectedEvent.title,
        start: this.selectedEvent.startStr,
        end: this.selectedEvent.endStr
      };
      this.isEditing = true;
      this.showForm = true;
    },
    saveEvent() {
      if (this.isEditing) {
        axios.put(`/api/events/${this.selectedEvent.id}`, this.form).then(() => {
          this.fetchEvents();
          this.cancelForm();
        });
      } else {
        axios.post('/api/events', this.form).then(() => {
          this.fetchEvents();
          this.cancelForm();
        });
      }
    },
    deleteEvent() {
      axios.delete(`/api/events/${this.selectedEvent.id}`).then(() => {
        this.fetchEvents();
        this.cancelForm();
      });
    },
    cancelForm() {
      this.showForm = false;
    }
  },
  mounted() {
    this.fetchEvents();
  }
};

  </script>
  
  <style scoped>
  .calendar-container {
    display: flex;
  }
  
  .calendar {
    flex: 3;
    margin-right: 20px;
  }
  
  .event-form {
    flex: 1;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
  }
  
  .event-form div {
    margin-bottom: 10px;
  }
  
  .event-form button {
    margin-right: 5px;
  }
  </style>
  