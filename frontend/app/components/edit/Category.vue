<template>
   <div v-if="editCategory" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 max-w-lg w-full p-6 rounded-sm border border-dark-theme-800">
         <!-- Form -->
         <div class="flex flex-col items-baseline justify-center gap-6 w-full">
            <!-- Big Title -->
            <div class="flex flex-col gap-2 w-full">
               <div class="text-dark-theme-50 flex flex-row items-center justify-between">
                  <span class="text-lg font-medium tracking-tight">Edit informasi kategori.</span>
                  <svg type="button" @click="close" class="hover:bg-dark-theme-800 p-1 rounded-sm hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                     <rect width="36" height="36" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m14.5 9.5l-5 5m0-5l5 5M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                  </svg>
               </div>
               <!-- Small Title -->
               <div>
                  <span class="text-dark-theme-400 text-base font-normal tracking-tight">Perbarui gambar atau nama untuk kategori yang sudah ditambahkan anda.</span>
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Foto Kategori</span>
               </div>
               <!-- Input Box -->
               <div @click="photoInput.click()" class="relative text-dark-theme-400 w-full h-54 rounded-sm border border-dark-theme-800 bg-dark-theme-900 overflow-hidden flex flex-col items-center justify-center gap-2 cursor-pointer hover:bg-dark-theme-800 transition-all">
                  <img v-if="photoPreview" :src="photoPreview" class="absolute inset-0 w-full h-full object-contain" />
                  <div v-else class="flex flex-col items-center justify-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 13H9m3-3v6m7-6h-1M2 13.364c0-3.065 0-4.597.749-5.697a4.4 4.4 0 0 1 1.226-1.204c.72-.473 1.622-.642 3.003-.702c.659 0 1.226-.49 1.355-1.125A2.064 2.064 0 0 1 10.366 3h3.268c.988 0 1.839.685 2.033 1.636c.129.635.696 1.125 1.355 1.125c1.38.06 2.282.23 3.003.702c.485.318.902.727 1.226 1.204c.749 1.1.749 2.632.749 5.697s0 4.596-.749 5.697a4.4 4.4 0 0 1-1.226 1.204C18.904 21 17.343 21 14.222 21H9.778c-3.121 0-4.682 0-5.803-.735A4.4 4.4 0 0 1 2.75 19.06A3.4 3.4 0 0 1 2.277 18" />
                     </svg>
                     <span class="text-base tracking-tight">Masukkan foto kategori.</span>
                     <span class="text-base tracking-tight">.png, .jpg, .jpeg</span>
                  </div>
                  <input ref="photoInput" type="file" accept="image/png, image/jpg, image/jpeg" class="hidden" @change="handlePhoto" />
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Nama Kategori</span>
               </div>
               <!-- Input Box -->
               <div class="flex flex-row w-full">
                  <input v-model="name" type="text" placeholder="Masukkan nama kategori" class="placeholder:text-dark-theme-400 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900 w-full px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" />
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-row w-full">
               <!-- Button -->
               <button @click="handleUpdate" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-sm w-full text-md tracking-tight hover:bg-dark-theme-400 hover:cursor-pointer">
                  {{ loading ? 'Memperbarui...' : 'Perbarui' }}
               </button>
            </div>

            <!-- Error -->
            <div v-if="error" class="w-full text-dark-theme-50 bg-red-600 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-sm tracking-tight">
               {{ error }}
            </div>
         </div>
      </div>
   </div>
</template>

<script setup>
// Import
import { useCategoryStore } from '~/stores/category'
import { ref, watch } from 'vue'

// Variable
const props = defineProps({
   idCategory: { type: [Number, String], default: null },
   categoryName: { type: String, default: '' },
   categoryPhoto: { type: String, default: '' },
})
const emit = defineEmits(['updated'])
const category = useCategoryStore()
const editCategory = defineModel({ type: Boolean, default: false })
const name = ref('')
const photoInput = ref(null)
const photoPreview = ref(null)
const photoFile = ref(null)
const loading = ref(false)
const error = ref(null)

// Fetch Data Function
watch(editCategory, (val) => {
   if (val) {
      name.value = props.categoryName
      photoPreview.value = props.categoryPhoto
      photoFile.value = null
      error.value = null
   }
})

// Photo Function
const handlePhoto = (e) => {
   const file = e.target.files[0]
   if (!file) return
   photoFile.value = file
   photoPreview.value = URL.createObjectURL(file)
}

// Update Function
const handleUpdate = async () => {
   if (!name.value.trim()) {
      error.value = 'Nama kategori wajib diisi!'
      return
   }
   loading.value = true
   error.value = null
   category.name = name.value
   category.photo = photoFile.value
   const data = await category.update(props.idCategory)

   if (data?.success) {
      emit('updated')
      close()
   } else if (data?.errors) {
      const firstError = Object.values(data.errors)[0]
      error.value = Array.isArray(firstError) ? firstError[0] : firstError
   } else {
      error.value = data?.message || 'Gagal memperbarui kategori!'
   }
   loading.value = false
}

// Close Pop Up Function
const close = () => {
   editCategory.value = false
}
</script>
