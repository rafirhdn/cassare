<template>
   <div class="font-mono">
      <!-- Wrapper -->
      <div class="w-full border-b border-dark-theme-800 px-4 py-4 flex flex-row items-center justify-between">
         <!-- Title -->
         <span class="text-dark-theme-50 text-base font-normal tracking-tight flex flex-row gap-2">
            <div class="pr-2 border-r border-dark-theme-800">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-width="1.5">
                     <path stroke-linecap="round" d="M21.483 19c-.04.936-.165 1.51-.569 1.914c-.586.586-1.528.586-3.414.586s-2.828 0-3.414-.586s-.586-1.528-.586-3.414v-2c0-1.886 0-2.828.586-3.414s1.528-.586 3.414-.586s2.828 0 3.414.586c.532.531.581 1.357.585 2.914" />
                     <path d="M2 8.5c0 1.886 0 2.828.586 3.414S4.114 12.5 6 12.5s2.828 0 3.414-.586S10 10.386 10 8.5v-2c0-1.886 0-2.828-.586-3.414S7.886 2.5 6 2.5s-2.828 0-3.414.586S2 4.614 2 6.5z" />
                     <path stroke-linecap="round" d="M15.5 2.513c-.327.017-.562.055-.765.14a2 2 0 0 0-1.083 1.082c-.152.367-.152.833-.152 1.765s0 1.398.152 1.765a2 2 0 0 0 1.083 1.083c.367.152.833.152 1.765.152h2c.932 0 1.398 0 1.765-.152a2 2 0 0 0 1.083-1.083c.152-.367.152-.833.152-1.765s0-1.398-.152-1.765a2 2 0 0 0-1.083-1.083c-.204-.084-.438-.122-.765-.139" />
                     <path d="M2 18.5c0 .932 0 1.398.152 1.765a2 2 0 0 0 1.083 1.083c.367.152.833.152 1.765.152h2c.932 0 1.398 0 1.765-.152a2 2 0 0 0 1.083-1.083C10 19.898 10 19.432 10 18.5s0-1.398-.152-1.765a2 2 0 0 0-1.083-1.083C8.398 15.5 7.932 15.5 7 15.5H5c-.932 0-1.398 0-1.765.152a2 2 0 0 0-1.083 1.083C2 17.102 2 17.568 2 18.5Z" />
                  </g>
               </svg>
            </div>
            Kategori
         </span>

         <!-- Button -->
         <button @click="addCategory = true" class="bg-dark-theme-50 rounded-sm flex flex-row gap-2 py-1 px-4 hover:bg-dark-theme-400 text-dark-theme-950 hover:cursor-pointer text-sm font-normal tracking-tight items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
               <rect width="24" height="24" fill="none" />
               <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 12h-3m0 0H9m3 0V9m0 3v3M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
            </svg>
            Tambah
         </button>
      </div>

      <!-- Wrapper -->
      <div class="py-4 px-4 flex flex-row justify-between">
         <!-- Button -->
         <div ref="filterRef" class="w-30 text-dark-theme-50 relative">
            <button @click="filter = !filter" class="w-full flex flex-row justify-base items-center gap-4 bg-dark-theme-900 border border-dark-theme-800 px-4 py-2 rounded-sm hover:bg-dark-theme-800 hover:cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20.058 9.723c.948-.534 1.423-.801 1.682-1.232c.26-.43.26-.949.26-1.987v-.69c0-1.326 0-1.99-.44-2.402C21.122 3 20.415 3 19 3H5c-1.414 0-2.121 0-2.56.412S2 4.488 2 5.815v.69c0 1.037 0 1.556.26 1.986s.733.698 1.682 1.232l2.913 1.64c.636.358.955.537 1.183.735c.474.411.766.895.898 1.49c.064.284.064.618.064 1.285v2.67c0 .909 0 1.364.252 1.718c.252.355.7.53 1.594.88c1.879.734 2.818 1.101 3.486.683S15 19.452 15 17.542v-2.67c0-.666 0-1 .064-1.285a2.68 2.68 0 0 1 .899-1.49" />
               </svg>
               <span class="text-base tracking-tight">Filter</span>
            </button>

            <div v-if="filter" class="w-30 absolute top-12 left-0 bg-dark-theme-900 border border-dark-theme-800 rounded-sm overflow-hidden z-10">
               <button class="w-full flex flex-row justify-base items-center gap-4 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 11l-7 6l-1.75-1.5M5 11l2.333 2M5 7l7 6l1.75-1.5M19 7l-2.333 2" />
                  </svg>
                  A - Z
               </button>
               <button class="w-full flex flex-row justify-base items-center gap-4 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 13l-7-6l-1.75 1.5M5 13l2.333-2M5 17l7-6l1.75 1.5M19 17l-2.333-2" />
                  </svg>
                  Z - A
               </button>
            </div>
         </div>

         <!-- Input Box -->
         <div class="text-dark-theme-50 relative">
            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m20 20l2 2M6.75 3.27a9.5 9.5 0 1 1-3.48 3.48" />
               </svg>
            </div>
            <input placeholder="Cari" type="text" class="bg-dark-theme-900 border border-dark-theme-800 placeholder:text-dark-theme-400 px-10 py-2 rounded-sm focus:outline-dark-theme-100 focus:outline-2 w-2xs font-normal tracking-tight" />
         </div>
      </div>

      <!-- Wrapper -->
      <div class="px-4 py-2 grid grid-cols-3 gap-4">
         <!-- Card -->
         <div v-for="item in categories" :key="item.id_category" class="bg-dark-theme-900 rounded-sm p-4 border border-dark-theme-800 flex flex-col gap-3">
            <div class="w-full h-44 rounded-sm overflow-hidden">
               <img :src="item.photo" :alt="item.name" src="" alt="" class="w-full h-full object-cover" />
            </div>
            <div>
               <span class="text-dark-theme-50 text-base tracking-tight font-normal">{{ item.name }}</span>
            </div>
            <!-- Button -->
            <div class="flex flex-row gap-2">
               <button @click="openEdit(item)" class="bg-dark-theme-50 text-dark-theme-950 py-2 flex-1 text-sm font-normal tracking-tight rounded-sm hover:bg-dark-theme-400 cursor-pointer">Edit</button>
               <button
                  @click="deleteCategory = true; selectedId = item.id_category"
                  class="bg-dark-theme-800 text-dark-theme-50 py-2 flex-1 text-sm font-normal tracking-tight rounded-sm hover:bg-dark-theme-600 cursor-pointer">
                  Hapus
               </button>
            </div>
         </div>
      </div>

      <!-- Component -->
      <AddCategory v-model="addCategory" @added="fetchCategories" />
      <EditCategory v-model="editCategory" :id-category="selectedCategory?.id_category" :category-name="selectedCategory?.name" :category-photo="selectedCategory?.photo" @updated="fetchCategories" />
      <DeleteCategory v-model="deleteCategory" :id-category="selectedId" @deleted="fetchCategories" />
   </div>
</template>

<script setup>
// Import
import { useCategoryStore } from '~/stores/category'
import { ref, onMounted } from 'vue'

// Variable
const config = useRuntimeConfig()
const category = useCategoryStore()
const categories = ref([])
const selectedId = ref(null)
const selectedCategory = ref(null)
const filter = ref(false)
const filterRef = ref(null)
const addCategory = ref(false)
const editCategory = ref(false)
const deleteCategory = ref(false)

// Open Edit Form Function
const openEdit = (item) => {
   selectedCategory.value = item
   editCategory.value = true
}

// Fetch Category Data Function
const fetchCategories = async () => {
   const data = await category.index()
   categories.value = data.data.map((item) => ({
      ...item,
      photo: `${config.public.baseKey}/uploads/category/${item.photo}`,
   }))
}

// Click Outside Function
const handleClickOutside = (event) => {
   if (filterRef.value && !filterRef.value.contains(event.target)) {
      filter.value = false
   }
}

onMounted(() => {
   fetchCategories()
   document.addEventListener('click', handleClickOutside)
})
onUnmounted(() => document.removeEventListener('click', handleClickOutside))

// Layout Cashier
definePageMeta({
   layout: 'cashier',
})
</script>
