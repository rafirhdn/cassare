<template>
   <div v-if="editCashier" class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm">
      <div class="flex flex-col items-center justify-center bg-dark-theme-950 max-w-xl w-full p-6 rounded-sm border border-dark-theme-800">
         <!-- Form -->
         <form @submit.prevent="handleUpdate" class="w-full flex flex-col items-baseline justify-center gap-4">
            <!-- Big Title -->
            <div class="flex flex-col gap-2 w-full">
               <div class="text-dark-theme-50 flex flex-row items-center justify-between">
                  <span class="text-lg font-medium tracking-tight">Edit akun kasir yang sudah dibuat.</span>
                  <svg type="button" @click="close" class="hover:bg-dark-theme-800 p-1 rounded-sm hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                     <rect width="36" height="36" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m14.5 9.5l-5 5m0-5l5 5M7 3.338A9.95 9.95 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.53 1.338-5" />
                  </svg>
               </div>
               <!-- Small Title -->
               <div>
                  <span class="text-dark-theme-400 text-base font-normal tracking-tight">Edit informasi akun dengan memperbarui data yang ada di formulir.</span>
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Nama</span>
               </div>
               <!-- Input Box -->
               <div class="flex flex-row w-full">
                  <input v-model="name" type="text" placeholder="Masukkan nama kasir" class="placeholder:text-dark-theme-400 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900 w-full px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" />
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Email</span>
               </div>
               <!-- Input Box -->
               <div class="flex flex-row w-full">
                  <input v-model="email" type="text" placeholder="Masukkan email kasir" class="placeholder:text-dark-theme-400 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900 w-full px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" />
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label -->
               <div>
                  <span class="text-dark-theme-50 text-base font-medium tracking-tight">Password</span>
               </div>
               <!-- Input Box -->
               <div class="flex flex-row w-full">
                  <input v-model="password" type="password" placeholder="Masukkan password kasir" class="placeholder:text-dark-theme-400 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900 w-full px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" />
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-row w-full">
               <!-- Button -->
               <button type="submit" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-sm w-full text-md tracking-tight hover:bg-dark-theme-400 hover:cursor-pointer">
                  {{ loading ? 'Menyimpan...' : 'Perbarui' }}
               </button>
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
import { useCashierStore } from '~/stores/cashier'
import { ref, watch } from 'vue'

// Variable
const props = defineProps({
   idCashier: { type: [Number, String], default: null },
   cashierName: { type: String, default: '' },
   cashierEmail: { type: String, default: '' },
   cashierPassword: { type: String, default: '' },
})
const emit = defineEmits(['updated'])
const cashier = useCashierStore()
const editCashier = defineModel({ type: Boolean, default: false })
const name = ref('')
const email = ref('')
const password = ref('')
const loading = ref(false)
const error = ref('')

// Fetch Data Function
watch(editCashier, async (val) => {
   if (val) {
      error.value = null
      name.value = ''
      email.value = ''
      password.value = ''
      loading.value = true

      const data = await cashier.show(props.idCashier)

      if (data?.success) {
         name.value = data.data.name
         email.value = data.data.email
         password.value = data.data.password
      } else {
         error.value = data?.message || 'Gagal memuat data kasir!'
      }

      loading.value = false
   }
})

// Update Function
const handleUpdate = async () => {
   if (!name.value.trim()) {
      error.value = 'Nama akun kasir wajib diisi!'
      return
   }
   loading.value = true
   error.value = null
   cashier.name = name.value
   cashier.email = email.value
   cashier.password = password.value
   const data = await cashier.update(props.idCashier)

   if (data?.success) {
      emit('updated')
      close()
   } else {
      error.value = data?.message || 'Gagal memperbarui data akun kasir!'
   }
   loading.value = false
}

// Close Pop Up Function
const close = () => {
   editCashier.value = false
}
</script>
