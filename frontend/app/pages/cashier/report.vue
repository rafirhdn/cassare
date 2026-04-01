<template>
   <div class="font-mono">
      <!-- Wrapper -->
      <div class="w-full border-b border-dark-theme-800 px-4 py-5 flex flex-row">
         <!-- Title -->
         <div>
            <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
               <div class="pr-2 border-r border-dark-theme-800">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                        <path d="M22 22H12c-4.714 0-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12V9m0-7v3" />
                        <path d="m19 7l-3.118 3.926c-.477.602-.716.903-.99 1.05a1.5 1.5 0 0 1-1.357.029c-.28-.135-.531-.425-1.035-1.005s-.755-.87-1.035-1.005a1.5 1.5 0 0 0-1.356.03c-.274.146-.513.447-.99 1.048L6 15" />
                     </g>
                  </svg>
               </div>
               Laporan
            </span>
         </div>
      </div>

      <!-- Wrapper -->
      <div class="py-4 px-4 flex flex-row justify-between">
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
      <div class="py-2 px-4 w-full">
         <div class="w-full rounded-sm overflow-hidden border border-dark-theme-800">
            <table class="w-full table-auto border-collapse">
               <thead class="text-dark-theme-50 bg-dark-theme-900">
                  <tr>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">No.</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Produk</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Pembayaran</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Total</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Kembalian</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Tanggal</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Waktu</td>
                  </tr>
               </thead>
               <tbody>
                  <tr v-if="carts.length === 0">
                     <td colspan="7" class="text-center text-dark-theme-400 text-sm px-4 py-4 tracking-tight">Tidak ada data.</td>
                  </tr>
                  <tr v-for="(item, index) in carts" :key="item.id_cart" class="border-b border-dark-theme-800 last:border-0">
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ index + 1 }}.</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.product_name }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-green-500 text-sm tracking-tight">{{ item.payment }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.price }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-yellow-500 text-sm tracking-tight">{{ item.change }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ formatDate(item.time) }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ formatTime(item.time) }}</span>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</template>

<script setup>
// Import
import { useCartStore } from '~/stores/cart'
import { ref, onMounted, onUnmounted } from 'vue'

// Variable
const cartStore = useCartStore()
const filter = ref(false)
const filterRef = ref(null)
const carts = ref([])

// Fetch Data Function
const fetchCarts = async () => {
   const data = await cartStore.index()
   console.log('Response:', data)
   console.log('Data:', data?.data)
   carts.value = data.data
}

// Format Date Function
const formatDate = (datetime) => {
   if (!datetime) return '-'
   const normalized = datetime.replace(' ', 'T') + 'Z'
   return new Date(normalized).toLocaleDateString('id-ID', {
      day: '2-digit',
      month: 'long',
      year: 'numeric',
      timeZone: 'Asia/Jakarta',
   })
}

// Format Time Function
const formatTime = (datetime) => {
   if (!datetime) return '-'
   const normalized = datetime.replace(' ', 'T') + 'Z'
   return new Date(normalized).toLocaleTimeString('id-ID', {
      hour: '2-digit',
      minute: '2-digit',
      timeZone: 'Asia/Jakarta',
   })
}

// Click Outside Function
const handleClickOutside = (event) => {
   if (filterRef.value && !filterRef.value.contains(event.target)) {
      filter.value = false
   }
}

onMounted(async () => {
   await fetchCarts()
   document.addEventListener('click', handleClickOutside)
})
onUnmounted(() => document.removeEventListener('click', handleClickOutside))

definePageMeta({
   layout: 'cashier',
})
</script>
