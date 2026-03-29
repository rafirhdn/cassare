<template>
   <div v-if="deleteCategory" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 p-6 max-w-lg w-full rounded-sm border border-dark-theme-800">
         <!-- Wrapper -->
         <div class="flex flex-col items-baseline justify-center gap-4 w-full">
            <!-- Small Title -->
            <div>
               <span class="text-dark-theme-50 text-base font-normal tracking-tight">Apa anda yakin ingin menghapus kategori ini?</span>
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
import { useCategoryStore } from '~/stores/category'
import { ref } from 'vue'

// Variable
const props = defineProps({
   idCategory: { type: Number, default: null },
})
const emit = defineEmits(['deleted'])
const category = useCategoryStore()
const loading = ref(false)

// Open Pop Up Function
const deleteCategory = defineModel({ type: Boolean, default: false })

// Delete Function
const handleDelete = async () => {
   loading.value = true
   const data = await category.destroy(props.idCategory)
   console.log(data)
   if (data.success) {
      emit('deleted')
      close()
   } else {
      console.error(data.message || 'Gagal menghapus kategori!')
   }
   loading.value = false
}

// Close Pop Up Function
const close = () => {
   deleteCategory.value = false
}
</script>
