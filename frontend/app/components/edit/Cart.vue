<template>
   <div v-if="editCart" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="grid grid-cols-[1fr_320px] bg-dark-theme-950 max-w-6xl w-full rounded-sm border border-dark-theme-800 max-h-[90vh]">
         <!-- Wrapper -->
         <div class="flex flex-col gap-4 p-6 overflow-y-auto border-r border-dark-theme-800">
            <div class="flex flex-col gap-1">
               <div class="text-dark-theme-50 flex flex-row items-center justify-between">
                  <span class="text-lg font-medium tracking-tight">Keranjang belanja produk.</span>
                  <svg type="button" @click="close" class="hover:bg-dark-theme-800 p-1 rounded-sm hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                     <rect width="36" height="36" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m14.5 9.5l-5 5m0-5l5 5M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                  </svg>
               </div>
               <span class="text-dark-theme-400 text-sm tracking-tight">Lihat daftar produk yang telah ditambahkan.</span>
            </div>

            <div class="bg-dark-theme-900 rounded-sm p-4 flex flex-col gap-4">
               <div class="grid grid-cols-7 gap-2 pb-2 border-b border-dark-theme-800">
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Produk</span>
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Jumlah</span>
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Harga</span>
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Total</span>
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Tipe</span>
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Estimasi</span>
                  <span class="text-dark-theme-200 text-xs tracking-tight text-center">Aksi</span>
               </div>

               <div v-for="item in carts" :key="item.id_product" class="grid grid-cols-7 gap-4 items-center py-2 border-b border-dark-theme-800 last:border-0">
                  <div class="flex flex-col gap-1">
                     <span class="text-dark-theme-50 text-sm tracking-tight font-medium">{{ item.product_name }}</span>
                  </div>

                  <div class="flex flex-row items-center justify-center gap-2">
                     <button @click="decreaseAmount(item)" class="w-7 h-7 flex items-center justify-center bg-dark-theme-800 text-dark-theme-50 rounded-sm hover:bg-dark-theme-600 cursor-pointer text-sm">-</button>
                     <span class="text-dark-theme-50 text-sm w-4 text-center">{{ item.amount }}</span>
                     <button @click="increaseAmount(item)" :disabled="item.amount >= item.maxStock" :class="item.amount >= item.maxStock ? 'w-7 h-7 flex items-center justify-center bg-dark-theme-800 text-dark-theme-400 rounded-sm cursor-not-allowed text-sm opacity-50' : 'w-7 h-7 flex items-center justify-center bg-dark-theme-800 text-dark-theme-50 rounded-sm hover:bg-dark-theme-600 cursor-pointer text-sm'">+</button>
                  </div>

                  <span class="text-dark-theme-50 text-sm tracking-tight text-center">{{ item.price }}</span>

                  <span class="text-green-500 text-sm tracking-tight text-center font-medium">{{ item.total }}</span>

                  <!-- Tipe -->
                  <div class="flex flex-row items-center justify-center gap-3">
                     <div :class="item.product_type === 'Siap-pesan' ? 'flex flex-row gap-2 items-center justify-center bg-green-950/75 px-2 py-1 rounded-sm' : item.product_type === 'Pra-pesan' ? 'flex flex-row gap-2 items-center justify-center bg-violet-950/50 px-2 py-1 rounded-sm' : 'flex flex-row gap-2 items-center justify-center bg-dark-theme-800 px-2 py-1 rounded-sm'">
                        <span :class="item.product_type === 'Siap-pesan' ? 'text-green-500 text-xs tracking-tight font-medium' : item.product_type === 'Pra-pesan' ? 'text-violet-500 text-xs tracking-tight font-medium' : 'text-dark-theme-400 text-xs tracking-tight font-medium'">
                           {{ item.product_type }}
                        </span>
                     </div>
                  </div>

                  <!-- Estimasi -->
                  <div class="flex flex-row items-center justify-center gap-3">
                     <div class="bg-dark-theme-800 text-dark-theme-50 text-xs px-2 py-1 rounded-sm text-center">{{ item.product_estimate }}</div>
                  </div>

                  <button
                     @click="
                        selectedDeleteId = item.id_product;
                        deleteCart = true
                     "
                     class="hover:bg-dark-theme-800 flex flex-row items-center justify-center p-1 text-dark-theme-50 rounded-sm hover:cursor-pointer w-fit mx-auto">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20.5 6h-17m5.67-2a3.001 3.001 0 0 1 5.66 0m3.544 11.4c-.177 2.654-.266 3.981-1.131 4.79s-2.195.81-4.856.81h-.774c-2.66 0-3.99 0-4.856-.81c-.865-.809-.953-2.136-1.13-4.79l-.46-6.9m13.666 0l-.2 3" />
                     </svg>
                  </button>
               </div>
            </div>
         </div>

         <!-- Wrapper -->
         <div class="flex flex-col gap-4 p-6 overflow-y-auto">
            <div class="flex flex-col gap-1">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Pembayaran</span>
               <span class="text-dark-theme-400 text-sm tracking-tight">Isi nominal pembayaran produk.</span>
            </div>

            <div class="bg-dark-theme-900 rounded-sm p-4 flex flex-col gap-2 border border-dark-theme-800">
               <div class="flex flex-row items-center justify-between">
                  <span class="text-dark-theme-400 text-sm tracking-tight">Rincian Produk</span>
                  <span class="text-dark-theme-50 text-sm tracking-tight">{{ carts.length }}</span>
               </div>
               <div class="flex flex-row items-center justify-between">
                  <span class="text-dark-theme-50 text-sm font-medium tracking-tight">Total Harga</span>
                  <span class="text-green-500 text-sm font-medium tracking-tight">{{ totalPrice }}</span>
               </div>
            </div>

            <div class="flex flex-col gap-2">
               <span class="text-dark-theme-50 text-sm font-medium tracking-tight">Nominal Pembayaran</span>
               <div class="flex flex-row items-center bg-dark-theme-900 border rounded-sm overflow-hidden" :class="touched && error ? 'border-red-500' : 'border-dark-theme-800'">
                  <span class="text-dark-theme-50 text-sm px-3 py-2 border-r border-dark-theme-800 shrink-0">Rp</span>
                  <input v-model="paymentAmount" @input="handlePaymentInput" type="text" placeholder="0" class="bg-transparent text-dark-theme-50 text-sm tracking-tight px-3 py-2 focus:outline-none w-full" />
               </div>
            </div>

            <div class="bg-dark-theme-900 border border-dark-theme-800 rounded-sm px-4 py-3 flex flex-row items-center justify-between">
               <span class="text-dark-theme-400 text-sm tracking-tight">Kembalian:</span>
               <span class="text-yellow-500 text-sm font-medium tracking-tight">{{ changeAmount }}</span>
            </div>

            <button @click="handleMakeReceipt" :disabled="loading || carts.length === 0 || !!error || !touched" class="bg-dark-theme-50 text-dark-theme-950 py-3 rounded-sm text-sm font-medium tracking-tight hover:bg-dark-theme-400 cursor-pointer w-full mt-auto disabled:opacity-50 disabled:cursor-not-allowed">
               {{ loading ? 'Memuat...' : 'Buat Struk' }}
            </button>

            <!-- Error -->
            <div v-if="touched && error" class="w-full text-dark-theme-50 bg-red-600 text-sm flex flex-row items-baseline justify-baseline px-4 py-2 rounded-sm tracking-tight">
               {{ error }}
            </div>
         </div>
      </div>

      <!-- Component -->
      <DeleteCart v-model="deleteCart" :idProduct="selectedDeleteId" />
   </div>
   <Receipt v-model="showReceipt" :items="receiptItems" :paymentAmount="receiptPayment" />
</template>

<script setup>
// Import
import { useCartStore } from '~/stores/cart'
import { ref, computed, nextTick } from 'vue'

// Variable
const cartStore = useCartStore()
const paymentAmount = ref('')
const editCart = defineModel({ type: Boolean, default: false })
const deleteCart = ref(false)
const selectedDeleteId = ref(null)
const showReceipt = ref(false)
const receiptItems = ref([])
const receiptPayment = ref(0)
const rawPayment = ref('')
const loading = ref(false)
const touched = ref(false)

// Cart Items Computed
const carts = computed(() => cartStore.items)

// Total Price Computed
const totalPrice = computed(() => {
   const total = cartStore.items.reduce((sum, item) => sum + item.amount * item.raw_price, 0)
   return `Rp ${total.toLocaleString('id-ID')}`
})

// Change Computed
const changeAmount = computed(() => {
   const total = cartStore.items.reduce((sum, item) => sum + item.amount * item.raw_price, 0)
   if (!rawPayment.value) return 'Rp 0'
   const paid = parseInt(rawPayment.value) || 0
   const result = paid - total
   return `Rp ${Math.max(0, result).toLocaleString('id-ID')}`
})

// Decrease Amount Function
const decreaseAmount = (item) => {
   const found = cartStore.items.find((i) => i.id_product === item.id_product)
   if (found && found.amount > 1) {
      found.amount--
      found.total = `Rp ${(found.raw_price * found.amount).toLocaleString('id-ID')}`
   }
}

// Increase Amount Function
const increaseAmount = (item) => {
   const found = cartStore.items.find((i) => i.id_product === item.id_product)
   if (found && found.amount < found.maxStock) {
      found.amount++
      found.total = `Rp ${(found.raw_price * found.amount).toLocaleString('id-ID')}`
   }
}

// Handle Payment Input Function
const handlePaymentInput = (e) => {
   touched.value = true
   const digits = e.target.value.replace(/\D/g, '')
   rawPayment.value = digits
   paymentAmount.value = digits ? parseInt(digits).toLocaleString('id-ID') : ''
}

// Make Receipt Function
const handleMakeReceipt = async () => {
   if (cartStore.items.length === 0) return
   loading.value = true
   receiptItems.value = [...cartStore.items]
   receiptPayment.value = parseInt(rawPayment.value) || 0

   const result = await cartStore.storeAll(receiptPayment.value)
   loading.value = false

   if (result.success) {
      editCart.value = false
      paymentAmount.value = ''
      rawPayment.value = ''
      touched.value = false
      await nextTick()
      showReceipt.value = true
   }
}

// Error Message Computed
const error = computed(() => {
   if (!touched.value) return null
   const total = cartStore.items.reduce((sum, item) => sum + item.amount * item.raw_price, 0)
   if (!rawPayment.value || rawPayment.value === '0') return 'Cantumkan nominal pembayaran!'
   const paid = parseInt(rawPayment.value) || 0
   if (paid < total) return 'Nominal pembayaran tidak mencukupi!'
   return null
})

// Close Function
const close = () => {
   editCart.value = false
   paymentAmount.value = ''
   rawPayment.value = ''
   touched.value = false
}
</script>
