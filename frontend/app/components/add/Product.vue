<template>
   <div v-if="addProduct" class="font-mono fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 max-w-4xl w-full p-6 rounded-sm border border-dark-theme-800">
         <!-- Form -->
         <form @submit.prevent="handleAddProduct" class="flex flex-col items-baseline justify-center gap-4 w-full">
            <!-- Big Title -->
            <div class="flex flex-col gap-2 w-full">
               <div class="text-dark-theme-50 flex flex-row items-center justify-between">
                  <span class="text-lg font-medium tracking-tight">Buat produk baru.</span>
                  <svg type="button" @click="close" class="hover:bg-dark-theme-800 p-1 rounded-sm hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                     <rect width="36" height="36" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m14.5 9.5l-5 5m0-5l5 5M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                  </svg>
               </div>
               <div>
                  <span class="text-dark-theme-400 text-base font-normal tracking-tight">Buat produk dengan memasukkan data sesuai ketentuan yang tertera.</span>
               </div>
            </div>

            <!-- Wrapper -->
            <div class="grid grid-cols-2 gap-4 w-full">
               <!-- Wrapper -->
               <div class="flex flex-col gap-2">
                  <!-- Label -->
                  <div>
                     <span class="text-dark-theme-50 text-base font-medium tracking-tight">Foto Produk</span>
                  </div>
                  <!-- Input Box -->
                  <div @click="$refs.photoInput.click()" class="relative text-dark-theme-400 w-full h-full rounded-sm border border-dark-theme-800 bg-dark-theme-900 overflow-hidden flex flex-col items-center justify-center gap-2 cursor-pointer hover:bg-dark-theme-800 transition-all">
                     <img v-if="photo" :src="photo" class="absolute inset-0 w-full h-full object-contain" />
                     <div v-else class="flex flex-col items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                           <rect width="24" height="24" fill="none" />
                           <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 13H9m3-3v6m7-6h-1M2 13.364c0-3.065 0-4.597.749-5.697a4.4 4.4 0 0 1 1.226-1.204c.72-.473 1.622-.642 3.003-.702c.659 0 1.226-.49 1.355-1.125A2.064 2.064 0 0 1 10.366 3h3.268c.988 0 1.839.685 2.033 1.636c.129.635.696 1.125 1.355 1.125c1.38.06 2.282.23 3.003.702c.485.318.902.727 1.226 1.204c.749 1.1.749 2.632.749 5.697s0 4.596-.749 5.697a4.4 4.4 0 0 1-1.226 1.204C18.904 21 17.343 21 14.222 21H9.778c-3.121 0-4.682 0-5.803-.735A4.4 4.4 0 0 1 2.75 19.06" />
                        </svg>
                        <span class="text-base tracking-tight">Klik untuk upload foto</span>
                        <span class="text-base tracking-tight">.png, .jpg, .jpeg</span>
                     </div>
                     <input ref="photoInput" type="file" accept="image/png, image/jpg, image/jpeg" class="hidden" @change="handlePhoto" />
                  </div>
               </div>

               <!-- Wrapper -->
               <div class="flex flex-col gap-2">
                  <div class="flex flex-col gap-2">
                     <!-- Label -->
                     <div>
                        <span class="text-dark-theme-50 text-base font-medium tracking-tight">Nama Produk</span>
                     </div>
                     <!-- Input Box -->
                     <div>
                        <input v-model="name" type="text" placeholder="Masukkan nama produk" class="bg-dark-theme-900 border border-dark-theme-800 text-dark-theme-50 placeholder:text-dark-theme-400 text-base tracking-tight px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 w-full" />
                     </div>
                  </div>

                  <!-- Wrapper -->
                  <div class="grid grid-cols-2 gap-3">
                     <!-- Wrapper -->
                     <div class="flex flex-col gap-2">
                        <!-- Label -->
                        <div>
                           <span class="text-dark-theme-50 text-base font-medium tracking-tight">Stok</span>
                        </div>
                        <!-- Input Box -->
                        <div>
                           <input v-model="stock" type="text" placeholder="Stok produk" class="bg-dark-theme-900 border border-dark-theme-800 text-dark-theme-50 placeholder:text-dark-theme-400 text-base tracking-tight px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 w-full" />
                        </div>
                     </div>

                     <!-- Wrapper -->
                     <div class="flex flex-col gap-2">
                        <!-- Label -->
                        <div>
                           <span class="text-dark-theme-50 text-base font-medium tracking-tight">Harga</span>
                        </div>
                        <!-- Input Box -->
                        <div>
                           <input v-model="price" type="text" placeholder="Harga produk" class="bg-dark-theme-900 border border-dark-theme-800 text-dark-theme-50 placeholder:text-dark-theme-400 text-base tracking-tight px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 w-full" />
                        </div>
                     </div>
                  </div>

                  <!-- Wrapper -->
                  <div class="flex flex-col gap-2">
                     <!-- Label -->
                     <div>
                        <span class="text-dark-theme-50 text-base font-medium tracking-tight">Kategori</span>
                     </div>
                     <!-- Button -->
                     <div ref="categoryRef" class="relative text-dark-theme-50">
                        <button type="button" @click="ddCategory = !ddCategory" class="w-full flex flex-row items-center gap-3 bg-dark-theme-900 border border-dark-theme-800 px-4 py-2 rounded-sm hover:bg-dark-theme-800 hover:cursor-pointer tracking-tight text-base">
                           <span :class="selectedCategory ? 'text-dark-theme-50' : 'text-dark-theme-400'">{{ selectedCategory || 'Pilih kategori produk' }}</span>
                        </button>
                        <div v-if="ddCategory" class="absolute top-12 mt-1 left-0 right-0 bg-dark-theme-900 border border-dark-theme-800 rounded-sm overflow-hidden z-10">
                           <button
                              v-for="cat in categories"
                              :key="cat.id_category"
                              type="button"
                              @click="
                                 selectedCategory = cat.name;
                                 selectedCategoryId = cat.id_category;
                                 ddCategory = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              {{ cat.name }}
                           </button>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Wrapper -->
               <div class="flex flex-col gap-2 h-full flex-1">
                  <!-- Label -->
                  <div>
                     <span class="text-dark-theme-50 text-base font-medium tracking-tight">Deskripsi Produk</span>
                  </div>
                  <!-- Input Box -->
                  <div class="flex-1">
                     <textarea v-model="description" placeholder="Masukkan deskripsi produk" class="bg-dark-theme-900 border border-dark-theme-800 text-dark-theme-50 placeholder:text-dark-theme-400 text-base tracking-tight px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 w-full h-full resize-none"></textarea>
                  </div>
               </div>

               <!-- Wrapper -->
               <div class="flex flex-col gap-3">
                  <!-- Wrapper -->
                  <div class="flex flex-col gap-2">
                     <!-- Label -->
                     <div>
                        <span class="text-dark-theme-50 text-base font-medium tracking-tight">Status</span>
                     </div>
                     <!-- Button -->
                     <div ref="statusRef" class="relative text-dark-theme-50">
                        <button type="button" @click="ddStatus = !ddStatus" class="w-full flex flex-row items-center gap-3 bg-dark-theme-900 border border-dark-theme-800 px-4 py-2 rounded-sm hover:bg-dark-theme-800 hover:cursor-pointer tracking-tight text-base">
                           <span :class="status ? 'text-dark-theme-50' : 'text-dark-theme-400'">{{ status || 'Pilih status produk' }}</span>
                        </button>
                        <div v-if="ddStatus" class="absolute top-12 mt-1 left-0 right-0 bg-dark-theme-900 border border-dark-theme-800 rounded-sm overflow-hidden z-10">
                           <button
                              type="button"
                              @click="
                                 status = 'Tersedia';
                                 ddStatus = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              Tersedia
                           </button>
                           <button
                              type="button"
                              @click="
                                 status = 'Tidak Tersedia';
                                 ddStatus = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              Tidak Tersedia
                           </button>
                        </div>
                     </div>
                  </div>

                  <!-- Wrapper -->
                  <div class="flex flex-col gap-2">
                     <!-- Label -->
                     <div>
                        <span class="text-dark-theme-50 text-base font-medium tracking-tight">Estimasi</span>
                     </div>
                     <!-- Button -->
                     <div ref="estimateRef" class="relative text-dark-theme-50">
                        <button type="button" @click="ddEstimate = !ddEstimate" class="w-full flex flex-row items-center gap-3 bg-dark-theme-900 border border-dark-theme-800 px-4 py-2 rounded-sm hover:bg-dark-theme-800 hover:cursor-pointer tracking-tight text-base">
                           <span :class="estimate ? 'text-dark-theme-50' : 'text-dark-theme-400'">{{ estimate || 'Pilih estimasi produk' }}</span>
                        </button>
                        <div v-if="ddEstimate" class="absolute top-12 mt-1 left-0 right-0 bg-dark-theme-900 border border-dark-theme-800 rounded-sm overflow-hidden z-10">
                           <button
                              type="button"
                              @click="
                                 estimate = 'Langsung Ambil';
                                 ddEstimate = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              Langsung Ambil
                           </button>
                           <button
                              type="button"
                              @click="
                                 estimate = '7 Hari Kerja';
                                 ddEstimate = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              7 Hari Kerja
                           </button>
                        </div>
                     </div>
                  </div>

                  <!-- Wrapper -->
                  <div class="flex flex-col gap-2">
                     <!-- Label -->
                     <div>
                        <span class="text-dark-theme-50 text-base font-medium tracking-tight">Tipe</span>
                     </div>
                     <!-- Button -->
                     <div ref="typeRef" class="relative text-dark-theme-50">
                        <button type="button" @click="ddType = !ddType" class="w-full flex flex-row items-center gap-3 bg-dark-theme-900 border border-dark-theme-800 px-4 py-2 rounded-sm hover:bg-dark-theme-800 hover:cursor-pointer tracking-tight text-base">
                           <span :class="type ? 'text-dark-theme-50' : 'text-dark-theme-400'">{{ type || 'Pilih tipe produk' }}</span>
                        </button>
                        <div v-if="ddType" class="absolute top-12 mt-1 left-0 right-0 bg-dark-theme-900 border border-dark-theme-800 rounded-sm overflow-hidden z-10">
                           <button
                              type="button"
                              @click="
                                 type = 'Pra-pesan';
                                 ddType = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              Pra-pesan
                           </button>
                           <button
                              type="button"
                              @click="
                                 type = 'Siap-pesan';
                                 ddType = false
                              "
                              class="w-full flex flex-row items-center gap-3 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                              Siap-pesan
                           </button>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- Wrapper -->
               <div class="col-span-2 w-full">
                  <!-- Button -->
                  <button type="submit" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-sm w-full text-base tracking-tight hover:bg-dark-theme-400 hover:cursor-pointer">
                     {{ loading ? 'Menyimpan...' : 'Simpan' }}
                  </button>
               </div>
            </div>

            <!-- Error -->
            <div v-if="error" class="w-full text-dark-theme-50 bg-red-600 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-sm tracking-tight">
               {{ error }}
            </div>
         </form>
      </div>
   </div>
</template>

<script setup>
// Import
import { useCategoryStore } from '~/stores/category'
import { useProductStore } from '~/stores/product'
import { ref, onMounted, onUnmounted } from 'vue'

// Variable
const productStore = useProductStore()
const categoryStore = useCategoryStore()
const emit = defineEmits(['added'])
const addProduct = defineModel({ type: Boolean, default: false })
const name = ref('')
const stock = ref('')
const price = ref('')
const description = ref('')
const photo = ref('')
const photoFile = ref(null)
const type = ref('')
const status = ref('')
const estimate = ref('')
const selectedCategory = ref('')
const selectedCategoryId = ref('')
const categories = ref([])
const ddType = ref(false)
const ddStatus = ref(false)
const ddEstimate = ref(false)
const ddCategory = ref(false)
const typeRef = ref(null)
const statusRef = ref(null)
const estimateRef = ref(null)
const categoryRef = ref(null)
const loading = ref(false)
const error = ref('')

// Fetch Categories Function
const fetchCategories = async () => {
   const data = await categoryStore.index()
   if (data.success) {
      categories.value = data.data
   }
}

// Photo Function
const handlePhoto = (e) => {
   const file = e.target.files[0]
   if (!file) return
   photoFile.value = file
   photo.value = URL.createObjectURL(file)
}

// Add Product Function
const handleAddProduct = async () => {
   loading.value = true
   error.value = ''
   productStore.name = name.value
   productStore.stock = stock.value
   productStore.price = price.value
   productStore.description = description.value
   productStore.photo = photoFile.value
   productStore.type = type.value
   productStore.status = status.value
   productStore.estimate = estimate.value
   productStore.id_category = selectedCategoryId.value

   const data = await productStore.store()

   if (data.success) {
      emit('added')
      close()
   } else {
      if (data.errors) {
         const firstError = Object.values(data.errors)[0]
         error.value = firstError[0]
      } else if (data.message) {
         error.value = data.message
      }
   }

   loading.value = false
}

// Click Outside Function
const handleClickOutside = (e) => {
   if (typeRef.value && !typeRef.value.contains(e.target)) ddType.value = false
   if (statusRef.value && !statusRef.value.contains(e.target)) ddStatus.value = false
   if (estimateRef.value && !estimateRef.value.contains(e.target)) ddEstimate.value = false
   if (categoryRef.value && !categoryRef.value.contains(e.target)) ddCategory.value = false
}

// Close Function
const close = () => {
   addProduct.value = false
   name.value = ''
   stock.value = ''
   price.value = ''
   description.value = ''
   photo.value = ''
   photoFile.value = null
   type.value = ''
   status.value = ''
   estimate.value = ''
   selectedCategory.value = ''
   categories.value = []
   ddType.value = false
   ddStatus.value = false
   ddEstimate.value = false
   ddCategory.value = false
   selectedCategoryId.value = ''
}

onMounted(() => {
   document.addEventListener('click', handleClickOutside)
   fetchCategories()
})
onUnmounted(() => document.removeEventListener('click', handleClickOutside))
</script>
