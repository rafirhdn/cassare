<template>
   <div v-if="deleteCart" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 p-6 max-w-lg w-full rounded-sm border border-dark-theme-800">
         <!-- Wrapper -->
         <div class="flex flex-col items-baseline justify-center gap-4 w-full">
            <!-- Small Title -->
            <div>
               <span class="text-dark-theme-50 text-base font-normal tracking-tight">Apa anda yakin ingin menghapus produk ini dari keranjang?</span>
            </div>
            <!-- Button -->
            <div class="flex flex-row gap-2">
               <button @click="handleDelete" class="text-dark-theme-950 bg-dark-theme-50 p-2 w-30 rounded-sm text-md tracking-tight hover:bg-dark-theme-400 hover:cursor-pointer">
                  {{ loading ? 'Proses...' : 'Iya' }}
               </button>
               <button @click="close" class="text-dark-theme-50 bg-dark-theme-800 p-2 w-30 rounded-sm text-md tracking-tight hover:bg-dark-theme-600 hover:cursor-pointer">Batal</button>
            </div>
         </div>
      </div>
   </div>
</template>

<script setup>
// Import
import { useCartStore } from '~/stores/cart'
import { ref } from 'vue'

// Variable
const props = defineProps({
   idProduct: { type: Number, default: null },
})
const emit = defineEmits(['deleted'])
const cart = useCartStore()
const loading = ref(false)
const deleteCart = defineModel({ type: Boolean, default: false })

// Delete Function
const handleDelete = () => {
   if (!props.idProduct) return
   loading.value = true
   const index = cart.items.findIndex((i) => i.id_product === props.idProduct)
   if (index !== -1) {
      cart.items.splice(index, 1)
   }
   emit('deleted')
   loading.value = false
   close()
}

// Close Function
const close = () => {
   deleteCart.value = false
}
</script>
