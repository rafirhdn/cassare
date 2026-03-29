<template>
   <div class="flex flex-col h-screen items-center justify-center bg-dark-theme-950">
      <div class="flex flex-col items-center justify-center max-w-sm w-full">
         <form @submit.prevent="handleVerifyOtpCode" class="flex flex-col gap-6 font-mono w-full">
            <div class="flex flex-col gap-1 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Masukkan kode OTP!</span>
               <span class="text-dark-theme-300 text-base font-normal tracking-tight">Kode OTP sudah dikirim melalui nomor WhatsApp anda.</span>
            </div>

            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <span class="text-dark-theme-50 text-base font-medium tracking-tight">Kode OTP</span>
               <div class="flex flex-row w-full">
                  <input v-model="otpCode" class="placeholder:text-dark-theme-300 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900/95 w-full px-4 py-2 rounded-md focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="text" placeholder="Masukkan kode OTP anda" />
               </div>
            </div>

            <div class="flex flex-row w-full">
               <button type="submit" :disabled="loading" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-md w-full text-md tracking-tight hover:bg-dark-theme-300 hover:cursor-pointer">
                  {{ loading ? 'Memproses...' : 'Verifikasi' }}
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
const otpCode = ref('')
const loading = ref(false)
const error = ref('')

const handleVerifyOtpCode = async () => {
   error.value = ''
   loading.value = true

   try {
      await auth.verifyOtp(email, otpCode.value)
      await navigateTo({ path: 'enterPassword', query: { email: email } })
   } catch (err) {
      if (err instanceof Error) {
         error.value = err.message
      } else if (typeof err === 'string') {
         error.value = err
      } else {
         error.value = 'Verifikasi OTP gagal!'
      }
   } finally {
      loading.value = false
   }
}

definePageMeta({ layout: 'auth' })
</script>
