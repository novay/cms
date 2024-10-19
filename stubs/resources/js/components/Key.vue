<script>
import { useMagicKeys } from '@vueuse/core'
import { ref, watch } from 'vue'

export default {
    data() {
        return {
            menubar: ref(true), 
            sidebar: ref(true)
        };
    },
    methods: {
        toggleMenubar() { this.menubar = !this.menubar; }, 
        toggleSidebar() { this.sidebar = !this.sidebar; }
    },
    mounted() {
        // Menubar
        const { Meta_M, Ctrl_M } = useMagicKeys({ passive: false, onEventFired(e) {
            if (e.key === 'm' && (e.metaKey || e.ctrlKey))
                e.preventDefault()
        }});
        watch([Meta_M, Ctrl_M], (v) => { if (v[0] || v[1]) 
            this.toggleMenubar()
        });

        // Sidebar
        const { Meta_S, Ctrl_S } = useMagicKeys({ passive: false, onEventFired(e) {
            if (e.key === 's' && (e.metaKey || e.ctrlKey))
                e.preventDefault()
        }});
        watch([Meta_S, Ctrl_S], (v) => { if (v[0] || v[1]) 
            this.toggleSidebar()
        });
    },
    render() {  
        return this.$slots.default({  
            menubar: this.menubar,
            toggleMenubar: this.toggleMenubar, 

            sidebar: this.sidebar,
            toggleSidebar: this.toggleSidebar, 
        });  
    },  
}

</script>