<template>
   <div class="font-mono">
      <!-- Header -->
      <div class="w-full border-b border-dark-theme-800">
         <div class="px-4 py-3.5">
            <div class="flex flex-row">
               <!-- Title -->
               <div class="flex flex-row w-full items-center justify-between">
                  <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
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

                  <!-- Add Button -->
                  <button @click="addCategory = true" class="bg-dark-theme-50 rounded-md flex flex-row gap-2 p-1 hover:bg-dark-theme-300 text-dark-theme-950 hover:cursor-pointer text-sm items-center px-2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 12h-3m0 0H9m3 0V9m0 3v3M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                     </svg>
                     Tambah
                  </button>
               </div>
            </div>
         </div>
      </div>

      <!-- Feature -->
      <div class="py-4 px-3.5 flex flex-row justify-between">
         <!-- Filter Sort -->
         <div class="w-35 text-dark-theme-50 relative">
            <button @click="filter = !filter" class="w-full flex flex-row justify-center items-center gap-2 bg-dark-theme-900/95 border border-dark-theme-800 px-2 py-2 rounded-lg hover:bg-dark-theme-800 hover:cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20.058 9.723c.948-.534 1.423-.801 1.682-1.232c.26-.43.26-.949.26-1.987v-.69c0-1.326 0-1.99-.44-2.402C21.122 3 20.415 3 19 3H5c-1.414 0-2.121 0-2.56.412S2 4.488 2 5.815v.69c0 1.037 0 1.556.26 1.986s.733.698 1.682 1.232l2.913 1.64c.636.358.955.537 1.183.735c.474.411.766.895.898 1.49c.064.284.064.618.064 1.285v2.67c0 .909 0 1.364.252 1.718c.252.355.7.53 1.594.88c1.879.734 2.818 1.101 3.486.683S15 19.452 15 17.542v-2.67c0-.666 0-1 .064-1.285a2.68 2.68 0 0 1 .899-1.49" />
               </svg>
               <span class="text-base tracking-tight">Urutkan</span>
            </button>

            <div v-if="filter" class="w-35 absolute top-12 left-0 bg-dark-theme-900/95 border border-dark-theme-800 rounded-lg overflow-hidden z-10">
               <button class="w-full flex flex-row justify-center items-center px-2 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">A - Z</button>
               <button class="w-full flex flex-row justify-center items-center px-2 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">Z - A</button>
            </div>
         </div>

         <!-- Search Bar -->
         <div class="text-dark-theme-50 relative">
            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m20 20l2 2M6.75 3.27a9.5 9.5 0 1 1-3.48 3.48" />
               </svg>
            </div>
            <input placeholder="Cari" type="text" class="bg-dark-theme-900/95 border border-dark-theme-800 placeholder:text-dark-theme-300 px-10 py-2 rounded-lg focus:outline-dark-theme-100 focus:outline-2 w-2xs" />
         </div>
      </div>

      <!-- Content -->
      <div></div>

      <!-- Pop Up -->
      <AddCategory v-model="addCategory" />
      <DeleteCategory v-model="deleteCategory" />
      <EditCategory v-model="editCategory" />
   </div>
</template>

<script setup>
// Import
import { ref } from 'vue'

// Variable
const filter = ref(false)

// Pop Up
const addCategory = ref(false)
const deleteCategory = ref(false)
const editCategory = ref(false)

// Layout Cashier
definePageMeta({
   layout: 'cashier',
})
</script>
