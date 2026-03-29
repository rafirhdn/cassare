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
                              <path d="M7.5 18a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Zm9 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Z" />
                              <path stroke-linecap="round" d="m9.5 9l.528 3.118M15.528 9L15 12.118M2 3l.261.092c1.302.457 1.953.686 2.325 1.231s.372 1.268.372 2.715V9.76c0 2.942.063 3.912.93 4.826c.866.914 2.26.914 5.05.914H12m4.24 0c1.561 0 2.342 0 2.894-.45c.551-.45.709-1.214 1.024-2.743l.5-2.424c.347-1.74.52-2.609.076-3.186c-.443-.577-1.96-.577-3.645-.577h-6.065m-6.066 0H7" />
                           </g>
                        </svg>
                     </div>
                     Produk
                  </span>

                  <!-- Add Button -->
                  <button class="bg-dark-theme-50 rounded-md flex flex-row gap-2 p-1 hover:bg-dark-theme-300 text-dark-theme-950 hover:cursor-pointer text-sm items-center px-2">
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
         <!-- Filter -->
         <div class="flex flex-row gap-2 items-center justify-center">
            <!-- Filter Sort -->
            <div class="w-35 text-dark-theme-50 relative">
               <button @click="filterSort = !filterSort" class="w-35 flex flex-row justify-center items-center gap-2 bg-dark-theme-900/95 border border-dark-theme-800 px-2 py-2 rounded-lg hover:bg-dark-theme-800 hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20.058 9.723c.948-.534 1.423-.801 1.682-1.232c.26-.43.26-.949.26-1.987v-.69c0-1.326 0-1.99-.44-2.402C21.122 3 20.415 3 19 3H5c-1.414 0-2.121 0-2.56.412S2 4.488 2 5.815v.69c0 1.037 0 1.556.26 1.986s.733.698 1.682 1.232l2.913 1.64c.636.358.955.537 1.183.735c.474.411.766.895.898 1.49c.064.284.064.618.064 1.285v2.67c0 .909 0 1.364.252 1.718c.252.355.7.53 1.594.88c1.879.734 2.818 1.101 3.486.683S15 19.452 15 17.542v-2.67c0-.666 0-1 .064-1.285a2.68 2.68 0 0 1 .899-1.49" />
                  </svg>
                  <span class="text-base tracking-tight">Urutkan</span>
               </button>

               <div v-if="filterSort" class="w-35 absolute top-12 left-0 bg-dark-theme-900/95 border border-dark-theme-800 rounded-lg overflow-hidden z-10">
                  <button class="w-full flex flex-row justify-center items-center px-2 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">A - Z</button>
                  <button class="w-full flex flex-row justify-center items-center px-2 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">Z - A</button>
               </div>
            </div>

            <!-- Filter Category -->
            <div class="w-35 text-dark-theme-50 relative">
               <button @click="filterCategory = !filterCategory" class="w-35 flex flex-row justify-center items-center gap-2 bg-dark-theme-900/95 border border-dark-theme-800 px-2 py-2 rounded-lg hover:bg-dark-theme-800 hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none">
                        <path stroke="currentColor" stroke-width="1.5" d="M12 20.283A6 6 0 1 0 17.5 10" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M9 2.803A6 6 0 1 1 6.341 6" />
                        <path fill="currentColor" d="M8 22v-.75zm-6-6h-.75zm.153 3.375a.75.75 0 1 0 1.299-.75zm4.097 1.576a.75.75 0 0 0-.5 1.415zm7-4.951c0 2.9-2.35 5.25-5.25 5.25v1.5A6.75 6.75 0 0 0 14.75 16zm-10.5 0a5.25 5.25 0 0 1 3.937-5.085l-.374-1.452A6.75 6.75 0 0 0 1.25 16zm10.156-1.874c.222.58.344 1.212.344 1.874h1.5c0-.848-.157-1.66-.443-2.41zm-9.454 4.498A5.2 5.2 0 0 1 2.75 16h-1.5c0 1.228.329 2.382.903 3.375zM8 21.25a5.2 5.2 0 0 1-1.75-.299l-.5 1.415A6.7 6.7 0 0 0 8 22.75z" />
                     </g>
                  </svg>
                  <span class="text-base tracking-tight">Kategori</span>
               </button>

               <div v-if="filterCategory" class="w-35 absolute top-12 left-0 bg-dark-theme-900/95 border border-dark-theme-800 rounded-lg overflow-hidden z-10">
                  <button class="w-full flex flex-row justify-center items-center px-2 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">Sayur</button>
               </div>
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
      <AddProduct v-model="addProduct" />
      <DeleteProduct v-model="deleteProduct" />
      <EditProduct v-model="editProduct" />
   </div>
</template>

<script setup>
// Import
import { ref } from 'vue'

// Variable
const filterSort = ref(false)
const filterCategory = ref(false)

// Pop Up
const addProduct = ref(false)
const deleteProduct = ref(false)
const editProduct = ref(false)

// Layout Cashier
definePageMeta({
   layout: 'cashier',
})
</script>
