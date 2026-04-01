<template>
   <div v-if="deleteProduct" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 p-6 max-w-lg w-full rounded-sm border border-dark-theme-800">
         <!-- Wrapper -->
         <div class="flex flex-col items-baseline justify-center gap-4 w-full">
            <!-- Small Title -->
            <div>
               <span class="text-dark-theme-50 text-base font-normal tracking-tight">Apa anda yakin ingin menghapus produk ini yang sudah anda buat?</span>
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
import { useProductStore } from '~/stores/product'
import { ref } from 'vue'

// Variable
const props = defineProps({
   idProduct: { type: Number, default: null },
})
const emit = defineEmits(['deleted', 'error'])
const product = useProductStore()
const loading = ref(false)

// Open Pop Up Function
const deleteProduct = defineModel({ type: Boolean, default: false })

// Delete Function
const handleDelete = async () => {
   loading.value = true
   const data = await product.destroy(props.idProduct)
   close()

   if (data.success) {
      emit('deleted')
   } else {
      emit('error', data.message)
   }
   loading.value = false
}

// Close Pop Up Function
const close = () => {
   deleteProduct.value = false
}
</script>
