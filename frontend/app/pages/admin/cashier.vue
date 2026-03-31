<template>
   <div class="font-mono">
      <!-- Wrapper -->
      <div class="w-full border-b border-dark-theme-800 px-4 py-4 flex flex-row">
         <div class="flex flex-row w-full items-center justify-between">
            <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
               <div class="pr-2 border-r border-dark-theme-800">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="6" r="4" />
                        <path stroke-linecap="round" d="M19.998 18q.002-.246.002-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437" />
                     </g>
                  </svg>
               </div>
               Kasir
            </span>

            <button @click="addCashier = true" class="bg-dark-theme-50 rounded-sm tracking-tight font-normal flex flex-row gap-2 py-1 px-4 hover:bg-dark-theme-400 text-dark-theme-950 hover:cursor-pointer text-sm items-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M15 12h-3m0 0H9m3 0V9m0 3v3m10-3c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464c.974.974 1.3 2.343 1.41 4.536" />
               </svg>
               Buat
            </button>
         </div>
      </div>

      <!-- Wrapper -->
      <div class="py-4 px-4 flex flex-row justify-between">
         <div ref="filterRef" class="w-30 text-dark-theme-50 relative">
            <button @click="filter = !filter" class="w-full flex flex-row justify-base items-center gap-4 bg-dark-theme-900 border border-dark-theme-800 px-4 py-2 rounded-sm hover:bg-dark-theme-800 hover:cursor-pointer">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M20.058 9.723c.948-.534 1.423-.801 1.682-1.232c.26-.43.26-.949.26-1.987v-.69c0-1.326 0-1.99-.44-2.402C21.122 3 20.415 3 19 3H5c-1.414 0-2.121 0-2.56.412S2 4.488 2 5.815v.69c0 1.037 0 1.556.26 1.986s.733.698 1.682 1.232l2.913 1.64c.636.358.955.537 1.183.735c.474.411.766.895.898 1.49c.064.284.064.618.064 1.285v2.67c0 .909 0 1.364.252 1.718c.252.355.7.53 1.594.88c1.879.734 2.818 1.101 3.486.683S15 19.452 15 17.542v-2.67c0-.666 0-1 .064-1.285a2.68 2.68 0 0 1 .899-1.49" />
               </svg>
               <span class="text-base tracking-tight">Filter</span>
            </button>

            <div v-if="filter" class="w-30 absolute top-12 left-0 bg-dark-theme-900 border border-dark-theme-800 rounded-sm overflow-hidden z-10">
               <button class="w-full flex flex-row justify-base items-center gap-4 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 11l-7 6l-1.75-1.5M5 11l2.333 2M5 7l7 6l1.75-1.5M19 7l-2.333 2" />
                  </svg>
                  A - Z
               </button>
               <button class="w-full flex flex-row justify-base items-center gap-4 px-4 py-2 text-base tracking-tight hover:bg-dark-theme-800 hover:cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 13l-7-6l-1.75 1.5M5 13l2.333-2M5 17l7-6l1.75 1.5M19 17l-2.333-2" />
                  </svg>
                  Z - A
               </button>
            </div>
         </div>

         <div class="text-dark-theme-50 relative">
            <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <rect width="24" height="24" fill="none" />
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="m20 20l2 2M6.75 3.27a9.5 9.5 0 1 1-3.48 3.48" />
               </svg>
            </div>
            <input placeholder="Cari" type="text" class="bg-dark-theme-900 border font-normal tracking-tight border-dark-theme-800 placeholder:text-dark-theme-400 px-10 py-2 rounded-sm focus:outline-dark-theme-100 focus:outline-2 w-2xs" />
         </div>
      </div>

        <!-- Wrapper -->
        <div class="py-2 px-4 w-full">
            <div class="w-full rounded-sm overflow-hidden border border-dark-theme-800">
                <table class="w-full table-auto border-collapse">
                <thead class="text-dark-theme-50 bg-dark-theme-900">
                    <tr>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">No.</td>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Nama</td>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Email</td>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Password</td>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Kontrol</td>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Status</td>
                        <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in cashiers" :key="item.id_admin">
                        <td class="border-r border-dark-theme-800 px-4 py-3">
                            <span class="text-dark-theme-200 text-sm tracking-tight">{{ index + 1 }}.</span>
                        </td>
                        <td class="border-r border-dark-theme-800 px-4 py-3">
                            <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.name }}</span>
                        </td>
                        <td class="border-r border-dark-theme-800 px-4 py-3">
                            <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.email }}</span>
                        </td>
                        <td class="border-r border-dark-theme-800 px-4 py-3">
                            <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.password }}</span>
                        </td>
                        <td class="px-4 py-3 border-r border-dark-theme-800">
                            <button @click="handleUnblock(item)" :disabled="item.status !== 'Blokir'" :class="item.status === 'Blokir' ? 'cursor-pointer hover:bg-dark-theme-400' : 'cursor-not-allowed opacity-50'" class="text-dark-theme-950 text-sm tracking-tight bg-dark-theme-50 px-3 py-1 rounded-sm">Aktifkan</button>
                        </td>
                        <td class="border-r border-dark-theme-800 px-4 py-3">
                            <div class="bg-dark-theme-800/50 py-1 px-4 text-center rounded-4xl w-max flex flex-row items-center gap-3">
                            <div :class="item.status === 'Aktif' ? 'bg-green-400' : 'bg-red-400'" class="w-2 h-2 rounded-full"></div>
                            <span :class="item.status === 'Aktif' ? 'text-green-400' : 'text-red-400'" class="text-dark-theme-200 text-sm tracking-tight">{{ item.status }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-row gap-2">
                            <button @click="openEdit(item)" class="text-dark-theme-950 text-sm tracking-tight bg-dark-theme-50 hover:bg-dark-theme-400 px-3 py-1 rounded-sm cursor-pointer">Edit</button>
                            <button
                                @click="
                                    deleteCashier = true;
                                    selectedId = item.id_admin
                                "
                                class="text-dark-theme-50 text-sm tracking-tight bg-dark-theme-800 hover:bg-dark-theme-600 cursor-pointer px-3 py-1 rounded-sm">
                                Hapus
                            </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

      <!-- Component -->
      <AddCashier v-model="addCashier" @added="fetchCashiers" />
      <EditCashier v-model="editCashier" :id-cashier="selectedCashier?.id_admin" :cashier-name="selectedCashier?.name" :cashier-email="selectedCashier?.email" :cashier-password="selectedCashier?.password" @updated="fetchCashiers" />
      <DeleteCashier v-model="deleteCashier" :id-cashier="selectedId" @deleted="fetchCashiers" />
   </div>
</template>

<script setup>
// Import
import { useAuthenticationStore } from '~/stores/authentication'
import { useCashierStore } from '~/stores/cashier'
import { ref, onMounted, onUnmounted } from 'vue'

// Variable
const cashier = useCashierStore()
const authentication = useAuthenticationStore()
const cashiers = ref([])
const selectedId = ref(null)
const selectedCashier = ref(null)
const filter = ref(false)
const filterRef = ref(null)
const addCashier = ref(false)
const editCashier = ref(false)
const deleteCashier = ref(false)

// Open Edit Form Function
const openEdit = (item) => {
   selectedCashier.value = item
   editCashier.value = true
}

// Fetch Cashier Data Function
const fetchCashiers = async () => {
   const data = await cashier.index()
   cashiers.value = data.data
}

// Click Outside Function
const handleClickOutside = (event) => {
   if (filterRef.value && !filterRef.value.contains(event.target)) {
      filter.value = false
   }
}

// Unblock Cashier Function
const handleUnblock = async (item) => {
   if (item.status !== 'Blokir') return
   const data = await authentication.unblock(item.id_admin)

   if (data?.success) {
      window.location.reload()
   } else {
      console.error(data?.message || 'Gagal mengaktifkan akun kasir!')
   }
}

onMounted(() => {
   fetchCashiers()
   document.addEventListener('click', handleClickOutside)
})
onUnmounted(() => document.removeEventListener('click', handleClickOutside))

// Layout Admin
definePageMeta({
   layout: 'admin',
})
</script>
