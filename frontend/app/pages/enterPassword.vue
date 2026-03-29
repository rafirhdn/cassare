<template>
   <div class="flex flex-col h-screen items-center justify-center bg-dark-theme-950">
      <div class="flex flex-col items-center justify-center max-w-sm w-full">
         <form @submit.prevent="handleChangePassword" class="flex flex-col gap-6 font-mono w-full">
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Perbarui password akun anda.</span>
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Buat password baru untuk akun anda.</span>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-base font-medium tracking-tight">Password Baru</span>
               <div class="flex flex-row w-full">
                  <input v-model="newPassword" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan password baru anda" />
               </div>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-base font-medium tracking-tight">Konfirmasi Password</span>
               <div class="flex flex-row w-full">
                  <input v-model="confirmationPassword" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="password" placeholder="Masukkan konfirmasi password anda" />
               </div>
            </div>

            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loading" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loading ? 'Memproses...' : 'Perbarui' }}
               </button>
            </div>

            <div v-if="error" class="w-full text-dark-theme-50 bg-red-500 text-base flex flex-row items-baseline justify-baseline px-4 py-2 rounded-md tracking-tight">
               {{ error }}
            </div>
         </form>
      </div>
   </div>
</template>

<script setup>
import { useAuthenticationStore } from '~/stores/authentication'
import { ref } from 'vue'

const auth = useAuthenticationStore()
const route = useRoute()
const email = route.query.email
const newPassword = ref('')
const confirmationPassword = ref('')
const loading = ref(false)
const error = ref('')

const handleChangePassword = async () => {
   error.value = ''
   loading.value = true

   try {
      await auth.changePassword(email, newPassword.value, confirmationPassword.value)
      await navigateTo('/login')
   } catch (err) {
      error.value = err.message || 'Ubah password gagal!'
   } finally {
      loading.value = false
   }
}

definePageMeta({ layout: 'auth' })
</script>
