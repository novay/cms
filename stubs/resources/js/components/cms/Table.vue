<template>
    <div>
        <!-- Skeleton Loader -->
        <template v-if="loading">
            <slot name="loading">
                <div class="animate-pulse">
                    <div class="flex items-center gap-1">
                        <h3 class="h-8 bg-stone-200 rounded-md dark:bg-stone-700 w-24"></h3>
                        <h3 class="h-8 bg-stone-200 rounded-md dark:bg-stone-700 w-10"></h3>
                        <h3 class="h-8 bg-stone-200 rounded-md dark:bg-stone-700 flex-1"></h3>
                        <h3 class="h-8 bg-stone-200 rounded-md dark:bg-stone-700 w-28"></h3>
                    </div>
                    <ul class="mt-3 space-y-3">
                        <li class="w-full h-5 bg-stone-200 rounded-md dark:bg-stone-700"></li>
                        <li class="w-full h-5 bg-stone-200 rounded-md dark:bg-stone-700"></li>
                        <li class="w-full h-5 bg-stone-200 rounded-md dark:bg-stone-700"></li>
                        <li class="w-full h-5 bg-stone-200 rounded-md dark:bg-stone-700"></li>
                    </ul>
                </div>
            </slot>
        </template>

        <div v-else>
            <div class="flex items-center gap-2 mb-1">
                <slot name="button"></slot>
                <div class="flex-auto relative">
                    <input placeholder="Cari..." type="text" v-model="search" @input="debouncedFetchCategories" autocomplete="off" class="block py-1.5 w-full rounded border dark:border-stone-800 shadow-sm sm:pl-9 text-sm focus:ring-stone-200 focus:border-stone-200 border-stone-200 dark:bg-stone-800 dark:text-white focus:outline-none focus:ring-0">
                    <div class="absolute inset-y-0 left-0 pl-3 hidden sm:flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-stone-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="relative">
                    <button @click="toggleDropdown" type="button" aria-haspopup="true" class="py-1.5 px-3 mx-0 inline-flex justify-center items-center gap-1.5 rounded border font-medium bg-white text-stone-700 align-middle hover:bg-stone-50 focus:z-10 focus:bg-stone-50 transition-all text-sm dark:bg-stone-800 dark:hover:bg-stone-700 dark:border-stone-800 dark:text-stone-400">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="h-5 w-5 text-stone-400 iconify iconify--mingcute" width="1em" height="1em" viewBox="0 0 24 24">
                            <g fill="none" fill-rule="evenodd">
                                <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"></path>
                                <path fill="currentColor" d="M4 12.001c.003-.016.017-.104.095-.277c.086-.191.225-.431.424-.708c.398-.553.993-1.192 1.745-1.798C7.777 7.996 9.812 7 12 7s4.223.996 5.736 2.216c.752.606 1.347 1.245 1.745 1.798c.2.277.338.517.424.708c.078.173.092.261.095.277V12c-.003.016-.017.104-.095.277a4.3 4.3 0 0 1-.424.708c-.398.553-.993 1.192-1.745 1.798C16.224 16.004 14.189 17 12 17s-4.223-.996-5.736-2.216c-.752-.606-1.347-1.245-1.745-1.798a4.2 4.2 0 0 1-.424-.708A1 1 0 0 1 4 12.001M12 5C9.217 5 6.752 6.254 5.009 7.659c-.877.706-1.6 1.474-2.113 2.187a6 6 0 0 0-.625 1.055C2.123 11.23 2 11.611 2 12c0 .388.123.771.27 1.099c.155.342.37.7.626 1.055c.513.713 1.236 1.48 2.113 2.187C6.752 17.746 9.217 19 12 19s5.248-1.254 6.991-2.659c.877-.706 1.6-1.474 2.113-2.187c.257-.356.471-.713.625-1.055c.148-.328.271-.71.271-1.099c0-.388-.123-.771-.27-1.099a6.2 6.2 0 0 0-.626-1.055c-.513-.713-1.236-1.48-2.113-2.187C17.248 6.254 14.783 5 12 5m-1 7a1 1 0 1 1 2 0a1 1 0 0 1-2 0m1-3a3 3 0 1 0 0 6a3 3 0 0 0 0-6"></path>
                            </g>
                        </svg>
                        <span class="hidden sm:inline">Show/Hide</span>
                    </button>
                    <div v-if="isDropdownOpen" class="absolute top-9 right-0 min-w-32 bg-white border rounded shadow-lg z-10 py-1">
                        <div v-for="column in columns" :key="column.name" class="flex items-center px-2 py-0">
                            <input type="checkbox" :id="column.name" v-model="column.visible" />
                            <label :for="column.name" class="ml-2">{{ column.label }}</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto">
                    <div class="py-1 align-middle inline-block min-w-full">
                        <div class="relative sm:overflow-hidden">
                            <table class="mt-2 min-w-full border-b dark:border-stone-700">
                                <thead class="bg-stone-50 dark:bg-stone-900 border divide-x divide-y dark:border-stone-800">
                                    <tr>
                                        <th v-for="column in visibleColumns" :key="column.name" class="px-2 py-2.5 text-xs border-l dark:border-stone-800 font-medium tracking-wide text-stone-400"
                                            :align="column.alignment || 'left'"
                                        >
                                            <a v-if="column.orderable" :href="'?sort=' + column.name" class="flex flex-row items-center" 
                                                :class="{
                                                    'justify-center': column.alignment == 'center',
                                                    'justify-start': column.alignment == 'left',
                                                    'justify-end': column.alignment == 'right'
                                                }">
                                                <span class="uppercase">
                                                    {{ column.label }}
                                                </span>
                                                <svg aria-hidden="true" class="w-3 h-3 ml-2 text-stone-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                                    <path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path>
                                                </svg>
                                            </a>

                                            <!-- Jika column.orderable == false, tampilkan sebagai <span> -->
                                            <span v-else class="flex flex-row items-center" 
                                                :class="{
                                                    'justify-center': column.alignment == 'center',
                                                    'justify-start': column.alignment == 'left',
                                                    'justify-end': column.alignment == 'right'
                                                }">
                                                <span class="uppercase">
                                                    {{ column.label }}
                                                </span>
                                            </span>
                                        </th>
                                        <th class="w-20 px-2 py-2.5 text-xs border-l dark:border-stone-800 font-medium tracking-wide text-stone-400">
                                            <span class="flex flex-row items-center justify-center">
                                                <span class="uppercase">
                                                    Tindakan
                                                </span>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-stone-200 bg-white dark:bg-stone-800 dark:divide-stone-900">
                                    <template v-if="categories.length > 0">
                                        <tr v-for="item in categories" :key="item.id" class="border dark:border-stone-800 hover:bg-stone-100 dark:hover:bg-stone-800 even:bg-stone-50/50">
                                            <td v-for="column in visibleColumns" :key="column.name" :align="column.alignment || 'left'" class="p-1.5 text-sm font-medium border-l text-stone-600 dark:text-stone-200 dark:border-stone-700" :class="column.classes">
                                                <slot :name="column.name" :item="item">{{ item[column.name] || 'N/A' }}</slot>
                                            </td>
                                            <td class="px-1 border-l">
                                                <div class="flex items-center justify-center gap-x-1">
                                                    <Link :href="`/${item.id}`" modal class="flex items-center gap-x-1 py-1 px-1.5 text-xs bg-green-600 border border-green-600 text-gray-100 rounded-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200">
                                                        <Icon icon="mingcute:edit-line" class="w-3.5 h-3.5" />
                                                        Sunting
                                                    </Link>
                                                    <Link :href="`/${item.id}`" v-tippy="'Hapus'"
                                                        class="flex items-center gap-x-1 py-1 px-1.5 bg-red-600 border border-red-600 text-gray-100 rounded-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-200"
                                                        confirm="Perhatian" 
                                                        confirm-text="Kamu yakin akan menghapus photo ini?" 
                                                        confirm-button="Ya"
                                                        cancel-button="Batalkan"
                                                        confirm-danger
                                                        method="DELETE"
                                                    >
                                                        <Icon icon="tabler:trash" class="w-3.5 h-3.5" />
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-else>
                                        <tr>
                                            <td :colspan="visibleColumns.length" class="text-center">
                                                <slot name="empty">No Data Available</slot>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination Controls -->
            <div v-if="!loading && pagination.total > 0">
                <nav role="navigation" aria-label="Navigasi paginasi" class="flex items-center justify-between py-3">
                    <div class="flex justify-between flex-1 md:hidden">
                        <span class="relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm font-medium text-stone-500 bg-white border border-stone-300 cursor-default leading-5 rounded">
                            « Sebelumnya 
                        </span>
                        <select v-model="per_page" @change="fetchCategories" class="block bg-stone-100 focus:ring-indigo-500 focus:border-indigo-500 min-w-max text-sm border-stone-200 dark:text-white dark:bg-stone-800 dark:border-stone-800 rounded py-1.5 pl-2 pr-7">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="relative inline-flex items-center px-3 py-1.5 text-xs sm:text-sm font-medium text-stone-500 bg-white border border-stone-300 cursor-default leading-5 rounded">
                            Berikutnya »
                        </span>
                    </div>
                    <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
                        <div class="flex items-center">
                            <select v-model="per_page" @change="fetchCategories" class="block bg-stone-100 focus:ring-indigo-500 focus:border-indigo-500 min-w-max text-sm border-stone-200 dark:text-white dark:bg-stone-800 dark:border-stone-800 rounded py-1.5 pl-2 pr-7">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <div class="hidden lg:block ml-3">
                                <p class="text-xs sm:text-sm text-stone-700 dark:text-stone-400 leading-5">
                                    <span class="font-medium" v-text="pagination.from"></span> ke 
                                    <span class="font-medium" v-text="pagination.to"></span> dari 
                                    <span class="font-medium" v-text="pagination.total"></span> hasil
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-0 inline-flex rounded">
                        <button @click="prevPage" :disabled="!pagination.prev_page_url" aria-label="&amp;laquo; Sebelumnya">
                            <span class="relative inline-flex items-center px-2 py-1.5 text-xs sm:text-sm font-medium text-stone-500 dark:bg-stone-700 dark:border-stone-700 border border-stone-200 cursor-default rounded-l leading-5" :class="!pagination.prev_page_url ? 'bg-gray-100 cursor-not-allowed' : 'bg-white cursor-pointer'">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>
                        <button @click="nextPage" :disabled="!pagination.next_page_url" aria-label="Berikutnya &amp;raquo;">
                            <span class="relative inline-flex items-center px-2 py-1.5 -ml-px text-xs sm:text-sm font-medium text-stone-500 dark:bg-stone-700 dark:border-stone-700 border border-stone-200 cursor-default rounded-r leading-5" :class="!pagination.next_page_url ? 'bg-gray-100 cursor-not-allowed' : 'bg-white cursor-pointer'">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>
  
<script setup>
    import { ref, onMounted, defineProps, computed } from 'vue';
    import axios from 'axios';

    const props = defineProps({
        url: {
            type: String,
            required: true,
        },
        columns: {
            type: Array,
            required: true,
        },
        order: {
            type: Array,
            required: true,
        },
    });
  
    // State management
    const categories = ref([]);
    const loading = ref(true);
    const search = ref("");
    const isDropdownOpen = ref(false);
    const per_page = ref(10);
    const pagination = ref([]);

    const APIKEY = 'your_api_key_here';

    // Initialize columns with visibility
    const initColumns = () => {
        return props.columns.map(column => ({
            ...column,
            visible: column.visible !== undefined ? column.visible : true 
        }));
    };

    const columns = ref(initColumns());
    const visibleColumns = computed(() => columns.value.filter(column => column.visible));

    // Toggle dropdown visibility
    const toggleDropdown = () => {
        isDropdownOpen.value = !isDropdownOpen.value;
    };

    // Fetch data from the API
    const fetchCategories = async (page = 1) => {
        loading.value = true; // Set loading to true before fetching data
        try {
            const response = await axios.get(`${props.url}`, {
                headers: {
                    Accept: 'application/json',
                    Authorization: APIKEY,
                },
                params: {
                    search: search.value,
                    per_page: per_page.value,
                    page: pagination.value.current_page,
                    sort_by: props.order[0], 
                    sort_direction: props.order[1]
                }
            });
            categories.value = response.data.data;
            pagination.value = {
                total: response.data.total,
                current_page: response.data.current_page,
                last_page: response.data.last_page,
                from: response.data.from,
                to: response.data.to,
                total: response.data.total,
                prev_page_url: response.data.prev_page_url,
                next_page_url: response.data.next_page_url,
            };
        } catch (error) {
            console.error('Error fetching categories:', error);
        } finally {
            loading.value = false;
        }
    };

    // Pagination functions
    const nextPage = () => {
        if (pagination.value.current_page < pagination.value.last_page) {
            pagination.value.current_page += 1;
            fetchCategories();
        }
    };

    const prevPage = () => {
        if (pagination.value.current_page > 1) {
            pagination.value.current_page -= 1;
            fetchCategories();
        }
    };

    // Debounce search input
    const debounce = (func, delay) => {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    };

    const debouncedFetchCategories = debounce(() => {
        fetchCategories();
    }, 300);

    // Initial data fetch
    onMounted(() => {
        fetchCategories();
    });
</script>