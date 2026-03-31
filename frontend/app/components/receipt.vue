<template>
   <div v-if="receipt" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="receipt-print bg-dark-theme-950 border border-dark-theme-800 rounded-sm p-6 w-full max-w-sm flex flex-col gap-4">

         <!-- Title -->
         <div class="flex flex-col items-center gap-2 border-b border-dashed border-dark-theme-700 pb-4">
            <span class="text-dark-theme-50 text-xl font-bold tracking-tight">Struk Pembelian</span>
            <div class="flex flex-col gap-1 text-center justify-center">
               <span class="text-dark-theme-400 text-sm tracking-tight">{{ transactionDay }}</span>
               <span class="text-dark-theme-400 text-sm tracking-tight">{{ transactionTime }}</span>
            </div>
         </div>

         <!-- Wrapper -->
         <div class="flex flex-col gap-2">
            <div v-for="item in items" :key="item.id_product" class="flex flex-row items-start justify-between gap-2">
               <div class="flex flex-col gap-1">
                  <span class="text-dark-theme-50 text-sm tracking-tight">{{ item.product_name }}</span>
                  <span class="text-dark-theme-400 text-sm tracking-tight">{{ item.amount }} x Rp {{ item.raw_price.toLocaleString('id-ID') }}</span>
               </div>
               <span class="text-dark-theme-50 text-sm tracking-tight font-medium whitespace-nowrap">Rp {{ (item.raw_price * item.amount).toLocaleString('id-ID') }}</span>
            </div>
         </div>

         <!-- Wrapper -->
         <div class="flex flex-col gap-2 border-t border-dashed border-dark-theme-700 pt-4">
            <div class="flex flex-row justify-between">
               <span class="text-dark-theme-400 text-sm tracking-tight">Total Harga</span>
               <span class="text-green-500 text-sm font-medium tracking-tight">Rp {{ totalPrice.toLocaleString('id-ID') }}</span>
            </div>
            <div class="flex flex-row justify-between">
               <span class="text-dark-theme-400 text-sm tracking-tight">Dibayar</span>
               <span class="text-dark-theme-50 text-sm tracking-tight">Rp {{ paymentAmount.toLocaleString('id-ID') }}</span>
            </div>
            <div class="flex flex-row justify-between">
               <span class="text-dark-theme-400 text-sm tracking-tight">Kembalian</span>
               <span class="text-yellow-500 text-sm font-medium tracking-tight">Rp {{ change.toLocaleString('id-ID') }}</span>
            </div>
         </div>

         <!-- Buttons -->
         <div class="flex flex-row gap-2 mt-2">
            <button @click="handlePrint" class="flex-1 bg-dark-theme-50 text-dark-theme-950 py-2 rounded-sm text-sm font-medium tracking-tight hover:bg-dark-theme-400 cursor-pointer">Cetak</button>
            <button @click="close" class="flex-1 bg-dark-theme-800 text-dark-theme-50 py-2 rounded-sm text-sm font-medium tracking-tight hover:bg-dark-theme-600 cursor-pointer">Tutup</button>
         </div>
      </div>
   </div>
</template>

<script setup>
// Import
import { computed } from 'vue'

// Variable
const props = defineProps({
   items: { type: Array, default: () => [] },
   paymentAmount: { type: Number, default: 0 },
})
const receipt = defineModel({ type: Boolean, default: false })

// Trsnaction Day Function
const transactionDay = computed(() => {
   return new Date().toLocaleString('id-ID', {
      day: '2-digit',
      month: 'long',
   })
})

// Trsnaction Time Function
const transactionTime = computed(() => {
   return new Date().toLocaleString('id-ID', {
      hour: '2-digit',
      minute: '2-digit',
   })
})

// Total Price Function
const totalPrice = computed(() => props.items.reduce((sum, item) => sum + item.raw_price * item.amount, 0))

// Change Function
const change = computed(() => {
   const result = props.paymentAmount - totalPrice.value
   return Math.max(0, result)
})

// Print Function
const handlePrint = () => {
   const receiptEl = document.querySelector('.receipt-print')
   const originalBody = document.body.innerHTML

   document.body.innerHTML = `
      <div style="min-height:100vh; display:flex; align-items:center; justify-content:center;">
         ${receiptEl.outerHTML}
      </div>
   `
   window.print()
   document.body.innerHTML = originalBody
   window.location.reload()
}

// Close Function
const close = () => {
   receipt.value = false
}
</script>
