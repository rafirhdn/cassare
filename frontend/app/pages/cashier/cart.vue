<template>
   <div class="font-mono">
      <!-- Warpper -->
      <div class="w-full border-b border-dark-theme-800 px-4 py-4 flex flex-row">
         <!-- Title -->
         <div class="flex flex-row w-full items-center justify-between">
            <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
               <div class="pr-2 border-r border-dark-theme-800">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="m19.5 9.5l-.71-2.605c-.274-1.005-.411-1.507-.692-1.886A2.5 2.5 0 0 0 17 4.172C16.56 4 16.04 4 15 4M4.5 9.5l.71-2.605c.274-1.005.411-1.507.692-1.886A2.5 2.5 0 0 1 7 4.172C7.44 4 7.96 4 9 4" />
                        <path d="M9 4a1 1 0 0 1 1-1h4a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 13v4m8-4v4m-4-4v4" />
                        <path stroke-linecap="round" d="M3.864 16.455c.546 2.183.819 3.274 1.632 3.91C6.31 21 7.435 21 9.685 21h4.63c2.25 0 3.375 0 4.19-.635c.813-.636 1.086-1.727 1.631-3.91c.858-3.432 1.287-5.147.387-6.301C19.622 9 17.853 9 14.316 9H9.685c-3.538 0-5.306 0-6.207 1.154c-.529.677-.6 1.548-.394 2.846" />
                     </g>
                  </svg>
               </div>
               Keranjang
            </span>

            <!-- Button -->
            <button @click="editCart = true" class="bg-dark-theme-50 rounded-sm tracking-tight font-normal flex flex-row gap-2 py-1 px-4 hover:bg-dark-theme-400 text-dark-theme-950 hover:cursor-pointer text-sm items-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                     <path stroke-linejoin="round" d="M2 5.5L3.214 7L7.5 3M2 12.5L3.214 14L7.5 10M2 19.5L3.214 21L7.5 17" />
                     <path d="M22 12h-5m-5 0h1.5M12 19h5m3.5 0H22m0-14H12" />
                  </g>
               </svg>
               Tinjau
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
      <div class="px-4 py-2 grid grid-cols-3 gap-6">
         <!-- Card -->
         <div v-for="item in products" :key="item.id_product" class="bg-dark-theme-900 rounded-sm p-4 flex flex-col gap-3 self-start border border-dark-theme-800">
            <div class="w-full h-44 min-[1400px]:h-54 rounded-sm overflow-hidden">
               <img :src="item.photo" :alt="item.name" class="w-full h-full object-cover" />
            </div>
            <div class="flex flex-col gap-2 items-baseline w-full">
               <div class="flex flex-row items-center justify-between w-full">
                  <span class="text-dark-theme-50 text-base tracking-tight font-normal">{{ item.name }}</span>
                  <div :class="item.stock === 0 ? 'flex flex-row gap-2 items-center justify-center bg-red-950/75 px-2 py-1 rounded-sm' : item.type === 'Siap-pesan' ? 'flex flex-row gap-2 items-center justify-center bg-green-950/75 px-2 py-1 rounded-sm' : 'flex flex-row gap-2 items-center justify-center bg-violet-950/50 px-2 py-1 rounded-sm'">
                     <div :class="item.stock === 0 ? 'w-2 h-2 rounded-full bg-red-500' : item.type === 'Siap-pesan' ? 'w-2 h-2 rounded-full bg-green-500' : 'w-2 h-2 rounded-full bg-violet-500'"></div>
                     <span :class="item.stock === 0 ? 'text-red-500 text-xs tracking-tight font-medium' : item.type === 'Siap-pesan' ? 'text-green-500 text-xs tracking-tight font-medium' : 'text-violet-500 text-xs tracking-tight font-medium'">
                        {{ item.stock === 0 ? 'Habis' : item.type }}
                     </span>
                  </div>
               </div>
               <span class="text-dark-theme-400 text-xs tracking-tight font-normal">{{ item.description }}</span>
            </div>
            <div class="flex flex-col gap-2">
               <div class="flex flex-row items-center gap-3">
                  <span class="text-dark-theme-400 text-xs w-18 shrink-0">Harga</span>
                  <span class="text-dark-theme-50 text-xs font-medium">{{ item.price }}</span>
               </div>
               <div class="flex flex-row items-center gap-3">
                  <span class="text-dark-theme-400 text-xs w-18 shrink-0">Stok</span>
                  <span class="text-dark-theme-50 text-xs font-medium">{{ item.stock }}</span>
               </div>
               <div class="flex flex-row items-center gap-3">
                  <span class="text-dark-theme-400 text-xs w-18 shrink-0">Kategori</span>
                  <span class="text-dark-theme-50 text-xs font-medium">{{ item.category_name }}</span>
               </div>
               <div class="flex flex-row items-center gap-3">
                  <span class="text-dark-theme-400 text-xs w-18 shrink-0">Status</span>
                  <span class="text-dark-theme-50 text-xs font-medium">{{ item.status }}</span>
               </div>
               <div class="flex flex-row items-center gap-3">
                  <span class="text-dark-theme-400 text-xs w-18 shrink-0">Estimasi</span>
                  <span class="text-dark-theme-50 text-xs font-medium">{{ item.estimate }}</span>
               </div>
            </div>
            <div class="flex items-center justify-center w-full bg-white rounded-sm px-2 py-4">
               <svg :id="`barcode-${item.id_product}`"></svg>
            </div>
            <!-- Button -->
            <div class="flex flex-row gap-2">
               <button
                  @click="
                     selectedProduct = item;
                     addCart = true
                  "
                  class="bg-dark-theme-50 text-dark-theme-950 py-2 flex-1 text-sm font-normal tracking-tight rounded-sm hover:bg-dark-theme-400 cursor-pointer">
                  Tambah Keranjang
               </button>
            </div>

            <div v-if="errorMap[item.id_product]" class="w-full text-dark-theme-50 bg-red-600 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-sm tracking-tight">
               {{ errorMap[item.id_product] }}
            </div>
         </div>
      </div>

      <!-- Component -->
      <AddCart v-model="addCart" :product="selectedProduct" @added="fetchProducts" @openEdit="editCart = true" @error="handleError" />
      <EditCart v-model="editCart" />
   </div>
</template>

<script setup>
// Import
import { useProductStore } from '~/stores/product'
import { useCartStore } from '~/stores/cart'
import { ref, onMounted, onUnmounted, nextTick } from 'vue'
import JsBarcode from 'jsbarcode'

// Variable
const config = useRuntimeConfig()
const product = useProductStore()
const cart = useCartStore()
const products = ref([])
const selectedProduct = ref(null)
const filter = ref(false)
const filterRef = ref(null)
const addCart = ref(false)
const editCart = ref(false)
const errorMap = ref({})
const scanBuffer = ref('')
const scanTimeout = ref(null)

// Handle Scan Function
const handleScan = (e) => {
   if (e.key === 'Enter') {
      const barcode = scanBuffer.value.trim()
      scanBuffer.value = ''

      if (!barcode) return
      const found = products.value.find((p) => p.barcode === barcode)
      if (!found) {
         return
      }

      if (found.stock <= 0) {
         errorMap.value[found.id_product] = 'Produk tidak punya stok!'
         setTimeout(() => { errorMap.value[found.id_product] = null }, 3000)
         return
      }

      const existing = cart.items.find((i) => i.id_product === found.id_product)
      if (existing && existing.amount >= existing.maxStock) {
         errorMap.value[found.id_product] = 'Stok produk sudah mencapai batas maksimal!'
         setTimeout(() => { errorMap.value[found.id_product] = null }, 3000)
         return
      }

      cart.addItem(found)
      editCart.value = true

   } else if (e.key.length === 1) {
      scanBuffer.value += e.key

      clearTimeout(scanTimeout.value)
      scanTimeout.value = setTimeout(() => {
         scanBuffer.value = ''
      }, 100)
   }
}

// Handle Error Function
const handleError = (id_product, message) => {
   errorMap.value[id_product] = message
}

// Fetch Product Data Function
const fetchProducts = async () => {
   const data = await product.index()
   products.value = data.data.map((item) => ({
      ...item,
      photo: `${config.public.baseKey}/uploads/product/${item.photo}`,
      category_name: item.category?.name || '',
      id_category: item.category?.id_category || item.id_category || '',
   }))

   await nextTick()

   products.value.forEach((item) => {
      const el = document.getElementById(`barcode-${item.id_product}`)
      if (el && item.barcode) {
         JsBarcode(el, item.barcode, {
            format: 'CODE128',
            width: 1.25,
            height: 75,
            displayValue: false,
            fontSize: 12,
            margin: 6,
            background: '#ffffff',
            lineColor: '#0a0a0a',
         })
      }
   })
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
   document.addEventListener('keydown', handleScan)
})

onUnmounted(() => {
   document.removeEventListener('click', handleClickOutside)
   document.removeEventListener('keydown', handleScan)
   clearTimeout(scanTimeout.value)
})

// Layout Cashier
definePageMeta({
   layout: 'cashier',
})
</script>
