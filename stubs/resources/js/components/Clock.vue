<template>
    <div>
        <a href="javascript:;" class="rounded-sm text-sm truncate font-medium outline-none focus:bg-accent focus:text-accent-foreground data-[state=open]:bg-accent data-[state=open]:text-accent-foreground relative py-1 px-1.5 flex items-center gap-1.5 dark:text-stone-100">
            {{ formattedTime }}
        </a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentTime: new Date(),
            };
        },
        computed: {
            formattedTime() {
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const day = days[this.currentTime.getDay()];
                const date = this.currentTime.getDate();
                const month = this.currentTime.toLocaleString('default', { month: 'short' });
                const year = this.currentTime.getFullYear();
                const hours = this.currentTime.getHours();
                const minutes = this.currentTime.getMinutes();
                
                return `${day}, ${date} ${month} ${hours}:${minutes < 10 ? '0' : ''}${minutes}`;
            },
        },
        mounted() {
            this.updateTime();
            setInterval(this.updateTime, 1000);
        },
        methods: {
            updateTime() {
                this.currentTime = new Date();
            },
        },
    };
</script>