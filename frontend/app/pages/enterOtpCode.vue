<template>
   <div class="flex flex-col h-screen items-center justify-center bg-dark-theme-950">
      <div class="flex flex-col items-center justify-center max-w-sm w-full">
         <!-- Form -->
         <form @submit.prevent="handleVerifyOtpCode" class="flex flex-col gap-6 font-mono w-full">
            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Big Title -->
               <span class="text-dark-theme-50 text-lg font-medium tracking-tight">Masukkan kode OTP!</span>
               <!-- Small Title -->
               <span class="text-dark-theme-400 text-base font-normal tracking-tight">Kode OTP sudah dikirim melalui nomor WhatsApp anda.</span>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-col gap-2 items-baseline justify-baseline w-full">
               <!-- Label -->
               <span class="text-dark-theme-50 text-base font-medium tracking-tight">Kode OTP</span>
               <!-- Input Box -->
               <div class="flex flex-row w-full">
                  <input v-model="otpCode" class="placeholder:text-dark-theme-400 placeholder:text-base placeholder:tracking-tight text-base tracking-tight text-dark-theme-50 bg-dark-theme-900 w-full px-4 py-2 rounded-sm focus:outline-2 focus:outline-dark-theme-100 border border-dark-theme-800" type="text" placeholder="Masukkan kode OTP anda" />
               </div>
            </div>

            <!-- Wrapper -->
            <div class="flex flex-row w-full">
               <!-- Button -->
               <button type="submit" :disabled="loading" class="text-dark-theme-950 bg-dark-theme-50 p-2 rounded-sm w-full text-md tracking-tight hover:bg-dark-theme-400 hover:cursor-pointer">
                  {{ loading ? 'Memproses...' : 'Verifikasi' }}
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
import { useAuthenticationStore } from '~/stores/authentication'
import { ref } from 'vue'

// Variable
const auth = useAuthenticationStore()
const route = useRoute()
const email = route.query.email
const otpCode = ref('')
const loading = ref(false)
const error = ref('')

// Verify Otp Code Function
const handleVerifyOtpCode = async () => {
   error.value = ''
   loading.value = true

   try {
      await auth.verifyOtp(email, otpCode.value)
      await navigateTo({ path: 'enterNewPassword', query: { email: email } })
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

// Layout Authentication
definePageMeta({
   layout: 'authentication'
})
</script>
