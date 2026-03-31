<template>
   <div v-if="addCart" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 p-6 max-w-lg w-full rounded-sm border border-dark-theme-800">
         <!-- Wrapper -->
         <div class="flex flex-col items-baseline justify-center gap-4 w-full">
            <!-- Small Title -->
            <div>
               <span class="text-dark-theme-50 text-base font-normal tracking-tight">Apa anda yakin ingin menambahkan produk ini ke keranjang?</span>
            </div>
            <!-- Button -->
            <div class="flex flex-row gap-2">
               <button @click="handleAdd" class="text-dark-theme-950 bg-dark-theme-50 p-2 w-30 rounded-sm text-md tracking-tight hover:bg-dark-theme-400 hover:cursor-pointer">
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
   product: { type: Object, default: null },
})
const emit = defineEmits(['added', 'openEdit'])
const cart = useCartStore()  // ← ini yang kurang
const loading = ref(false)
const addCart = defineModel({ type: Boolean, default: false })

// Add Function
const handleAdd = () => {
   if (!props.product) return
   loading.value = true
   cart.addItem(props.product)
   emit('added')
   emit('openEdit')
   loading.value = false
   close()
}

// Close Pop Up Function
const close = () => {
   addCart.value = false
}
</script>
