<template>
   <div class="font-mono">
      <!-- Wrapper -->
      <div class="w-full border-b border-dark-theme-800 px-4 py-4 flex flex-row">
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

            <!-- Button -->
            <button @click="addProduct = true" class="bg-dark-theme-50 rounded-sm tracking-tight font-normal flex flex-row gap-2 py-1 px-4 hover:bg-dark-theme-400 text-dark-theme-950 hover:cursor-pointer text-sm items-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 12h-3m0 0H9m3 0V9m0 3v3m10-3c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464c.974.974 1.3 2.343 1.41 4.536" />
               </svg>
               Buat
            </button>
         </div>
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
            <input placeholder="Cari" type="text" class="bg-dark-theme-900 border font-normal tracking-tight border-dark-theme-800 placeholder:text-dark-theme-400 px-10 py-2 rounded-sm focus:outline-dark-theme-100 focus:outline-2 w-2xs" />
         </div>
      </div>

      <!-- Wrapper -->
      <div class="px-4 py-2 grid grid-cols-3 gap-4">
         <!-- Card -->
         <div v-for="item in products" :key="item.id_product" class="bg-dark-theme-900 rounded-sm p-4 flex flex-col gap-3">
            <div class="w-full h-44 min-[1400px]:h-54 rounded-sm overflow-hidden">
               <img :src="item.photo" :alt="item.name" class="w-full h-full object-cover" />
            </div>
            <div>
               <span class="text-dark-theme-50 text-base tracking-tight font-normal">{{ item.name }}</span>
            </div>
            <!-- Button -->
            <div class="flex flex-row gap-2">
               <button @click="openEdit(item)" class="bg-dark-theme-50 text-dark-theme-950 py-2 flex-1 text-sm font-normal tracking-tight rounded-sm hover:bg-dark-theme-400 cursor-pointer">Edit</button>
               <button
                  @click="
                     deleteProduct = true;
                     selectedId = item.id_product
                  "
                  class="bg-dark-theme-800 text-dark-theme-50 py-2 flex-1 text-sm font-normal tracking-tight rounded-sm hover:bg-dark-theme-600 cursor-pointer">
                  Hapus
               </button>
            </div>
         </div>
      </div>

      <!-- Component -->
      <AddProduct v-model="addProduct" @added="fetchProducts" />
      <EditProduct v-model="editProduct" :idProduct="selectedProduct?.id_product" :productName="selectedProduct?.name" :productPhoto="selectedProduct?.photo" :productStock="selectedProduct?.stock" :productPrice="selectedProduct?.price" :productDescription="selectedProduct?.description" :productType="selectedProduct?.type" :productStatus="selectedProduct?.status" :productEstimate="selectedProduct?.estimate" :productCategoryId="selectedProduct?.id_category" :productCategoryName="selectedProduct?.category_name" @updated="fetchProducts" />
      <DeleteProduct v-model="deleteProduct" :idProduct="selectedId" @deleted="fetchProducts" />
   </div>
</template>

<script setup>
// Import
import { useProductStore } from '~/stores/product'
import { ref, onMounted, onUnmounted } from 'vue'

// Variable
const config = useRuntimeConfig()
const product = useProductStore()
const products = ref([])
const selectedId = ref(null)
const selectedProduct = ref(null)
const filter = ref(false)
const filterRef = ref(null)
const addProduct = ref(false)
const editProduct = ref(false)
const deleteProduct = ref(false)

// Open Edit Form Function
const openEdit = (item) => {
   selectedProduct.value = item
   editProduct.value = true
}

// Fetch Product Data Function
const fetchProducts = async () => {
   const data = await product.index()
   products.value = data.data.map((item) => ({
      ...item,
      photo: `${config.public.baseKey}/uploads/product/${item.photo}`,
      category_name: item.category?.name || '',
   }))
}

// Click Outside Function
const handleClickOutside = (event) => {
   if (filterRef.value && !filterRef.value.contains(event.target)) {
      filter.value = false
   }
}

onMounted(() => {
   fetchProducts()
   document.addEventListener('click', handleClickOutside)
})
onUnmounted(() => document.removeEventListener('click', handleClickOutside))

// Layout Cashier
definePageMeta({
   layout: 'cashier',
})
</script>
