<template>
   <div class="font-mono">
      <!-- Wrapper -->
      <div class="w-full border-b border-dark-theme-800 px-4 py-4 flex flex-row justify-between items-center">
         <!-- Title -->
         <div>
            <span class="text-dark-theme-50 text-base tracking-tight flex flex-row gap-2">
               <div class="pr-2 border-r border-dark-theme-800">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <rect width="24" height="24" fill="none" />
                     <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                        <path d="M22 22H12c-4.714 0-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12V9m0-7v3" />
                        <path d="m19 7l-3.118 3.926c-.477.602-.716.903-.99 1.05a1.5 1.5 0 0 1-1.357.029c-.28-.135-.531-.425-1.035-1.005s-.755-.87-1.035-1.005a1.5 1.5 0 0 0-1.356.03c-.274.146-.513.447-.99 1.048L6 15" />
                     </g>
                  </svg>
               </div>
               Laporan
            </span>
         </div>

         <button @click="exportExcel" class="bg-dark-theme-50 rounded-sm flex flex-row gap-2 py-1 px-4 hover:bg-dark-theme-400 text-dark-theme-950 hover:cursor-pointer text-sm font-normal tracking-tight items-center ml-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
               <rect width="24" height="24" fill="none" />
               <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v13m0 0l4-4.375M12 16l-4-4.375M15 21H9c-2.828 0-4.243 0-5.121-.879C3 19.243 3 17.828 3 15m18 0c0 2.828 0 4.243-.879 5.121c-.3.3-.662.498-1.121.628" />
            </svg>
            Export .xlsx
         </button>
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
         <div class="bg-dark-theme-900 border border-dark-theme-800 rounded-sm px-4 py-2">
            <div>
               <span class="text-dark-theme-50 text-base font-medium tracking-tight">Total Transaksi Harian</span>
            </div>
            <div class="mt-4 h-64">
               <canvas ref="chartRef"></canvas>
            </div>
         </div>
      </div>

      <!-- Wrapper -->
      <div class="py-2 px-4 w-full">
         <div class="w-full rounded-sm overflow-hidden border border-dark-theme-800">
            <table class="w-full table-auto border-collapse">
               <thead class="text-dark-theme-50 bg-dark-theme-900">
                  <tr>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">No.</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Akun</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Produk</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Pembayaran</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Harga</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Kembalian</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Tipe</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Tanggal</td>
                     <td class="text-base tracking-tight font-medium px-4 py-2 border-b border-r border-dark-theme-800">Waktu</td>
                  </tr>
               </thead>
               <tbody>
                  <tr v-if="carts.length === 0">
                     <td colspan="9" class="text-center text-dark-theme-400 text-sm px-4 py-4 tracking-tight">Tidak ada data.</td>
                  </tr>
                  <tr v-for="(item, index) in carts" :key="item.id_cart" class="border-b border-dark-theme-800 last:border-0">
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ index + 1 }}.</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.admin_name }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.product_name }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-green-500 text-sm tracking-tight">{{ item.payment }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ item.price }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-yellow-500 text-sm tracking-tight">{{ item.change }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <div :class="item.product_type === 'Siap-pesan' ? 'flex flex-row gap-2 items-center justify-center bg-green-950/75 px-2 py-1 rounded-sm' : item.product_type === 'Pra-pesan' ? 'flex flex-row gap-2 items-center justify-center bg-violet-950/50 px-2 py-1 rounded-sm' : 'flex flex-row gap-2 items-center justify-center bg-dark-theme-800 px-2 py-1 rounded-sm'">
                           <span :class="item.product_type === 'Siap-pesan' ? 'text-green-500 text-xs tracking-tight font-medium' : item.product_type === 'Pra-pesan' ? 'text-violet-500 text-xs tracking-tight font-medium' : 'text-dark-theme-400 text-xs tracking-tight font-medium'">
                              {{ item.product_type }}
                           </span>
                        </div>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ formatDate(item.time) }}</span>
                     </td>
                     <td class="border-r border-dark-theme-800 px-4 py-3">
                        <span class="text-dark-theme-200 text-sm tracking-tight">{{ formatTime(item.time) }}</span>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</template>

<script setup>
import { useCartStore } from '~/stores/cart'
import { ref, computed, onMounted, onUnmounted, nextTick } from 'vue'
import { Chart, registerables } from 'chart.js'
import * as XLSX from 'xlsx'

Chart.register(...registerables)

const cartStore = useCartStore()
const filter = ref(false)
const filterRef = ref(null)
const carts = ref([])
const chartRef = ref(null)
let chartInstance = null

// Fetch Data
const fetchCarts = async () => {
   const data = await cartStore.indexAll()
   carts.value = data.data
   await nextTick()
   renderChart()
}

const exportExcel = () => {
   if (carts.value.length === 0) return

   const rows = carts.value.map((item, index) => ({
      'No.': index + 1,
      Akun: item.admin_name ?? '-',
      Produk: item.product_name ?? '-',
      Pembayaran: item.payment ?? '-',
      Harga: item.price ?? '-',
      Kembalian: item.change ?? '-',
      Tipe: item.product_type ?? '-',
      Tanggal: formatDate(item.time),
      Waktu: formatTime(item.time),
   }))

   const worksheet = XLSX.utils.json_to_sheet([])

   XLSX.utils.sheet_add_aoa(worksheet, [['Laporan Transaksi Admin']], { origin: 'A1' })

   XLSX.utils.sheet_add_aoa(worksheet, [['']], { origin: 'A2' })

   XLSX.utils.sheet_add_json(worksheet, rows, { origin: 'A3' })

   const totalRows = rows.length + 3
   const colKeys = Object.keys(rows[0])
   const totalCols = colKeys.length

   worksheet['!merges'] = [{ s: { r: 0, c: 0 }, e: { r: 0, c: totalCols - 1 } }]

   worksheet['A1'].s = {
      font: { bold: true, sz: 14 },
      alignment: { horizontal: 'center', vertical: 'center' },
   }

   const borderStyle = {
      top: { style: 'thin', color: { rgb: '000000' } },
      bottom: { style: 'thin', color: { rgb: '000000' } },
      left: { style: 'thin', color: { rgb: '000000' } },
      right: { style: 'thin', color: { rgb: '000000' } },
   }

   for (let R = 2; R < totalRows; R++) {
      for (let C = 0; C < totalCols; C++) {
         const cellAddress = XLSX.utils.encode_cell({ r: R, c: C })
         if (!worksheet[cellAddress]) worksheet[cellAddress] = { v: '' }
         worksheet[cellAddress].s = {
            border: borderStyle,
            font: R === 2 ? { bold: true } : { bold: false },
            alignment: { horizontal: 'left', vertical: 'center' },
         }
      }
   }

   worksheet['!cols'] = colKeys.map((key) => ({
      wch: Math.max(key.length, ...rows.map((r) => String(r[key]).length)) + 2,
   }))

   const workbook = XLSX.utils.book_new()
   XLSX.utils.book_append_sheet(workbook, worksheet, 'Laporan')

   const filename = `Laporan_Transaksi_Admin_${new Date().toLocaleDateString('id-ID').replace(/\//g, '-')}.xlsx`
   XLSX.writeFile(workbook, filename, { cellStyles: true })
}

// Chart
const chartData = computed(() => {
   const grouped = {}

   carts.value.forEach((item) => {
      if (!item.time) return
      const normalized = item.time.replace(' ', 'T') + 'Z'
      const date = new Date(normalized).toLocaleDateString('id-ID', {
         day: '2-digit',
         month: 'short',
         year: 'numeric',
         timeZone: 'Asia/Jakarta',
      })
      grouped[date] = (grouped[date] || 0) + 1
   })

   const sorted = Object.entries(grouped).sort(([a], [b]) => new Date(a) - new Date(b))

   return {
      labels: sorted.map(([date]) => date),
      values: sorted.map(([, count]) => count),
   }
})

// Render Chart
const renderChart = () => {
   if (!chartRef.value) return

   if (chartInstance) {
      chartInstance.destroy()
      chartInstance = null
   }

   const { labels, values } = chartData.value

   chartInstance = new Chart(chartRef.value, {
      type: 'line',
      data: {
         labels,
         datasets: [
            {
               data: values,
               borderColor: '#ffffff',
               backgroundColor: 'rgba(255, 255, 255, 0.05)',
               borderWidth: 2,
               pointBackgroundColor: '#ffffff',
               pointRadius: 4,
               tension: 0.4,
               fill: true,
            },
         ],
      },
      options: {
         responsive: true,
         maintainAspectRatio: false,
         plugins: {
            legend: { display: false },
            tooltip: {
               callbacks: {
                  label: (ctx) => ` ${ctx.parsed.y} transaksi`,
               },
            },
         },
         scales: {
            x: {
               ticks: { color: '#94a3b8', font: { family: 'monospace', size: 11 } },
               grid: { color: 'rgba(255,255,255,0.05)' },
            },
            y: {
               beginAtZero: true,
               ticks: {
                  color: '#94a3b8',
                  font: { family: 'monospace', size: 11 },
                  stepSize: 1,
               },
               grid: { color: 'rgba(255,255,255,0.05)' },
            },
         },
      },
   })
}

// Format functions (tetap sama)
const formatDate = (datetime) => {
   if (!datetime) return '-'
   const normalized = datetime.replace(' ', 'T') + 'Z'
   return new Date(normalized).toLocaleDateString('id-ID', {
      day: '2-digit',
      month: 'long',
      year: 'numeric',
      timeZone: 'Asia/Jakarta',
   })
}

const formatTime = (datetime) => {
   if (!datetime) return '-'
   const normalized = datetime.replace(' ', 'T') + 'Z'
   return new Date(normalized).toLocaleTimeString('id-ID', {
      hour: '2-digit',
      minute: '2-digit',
      timeZone: 'Asia/Jakarta',
   })
}

const handleClickOutside = (event) => {
   if (filterRef.value && !filterRef.value.contains(event.target)) {
      filter.value = false
   }
}

onMounted(async () => {
   await fetchCarts()
   document.addEventListener('click', handleClickOutside)
})

onUnmounted(() => {
   document.removeEventListener('click', handleClickOutside)
   if (chartInstance) chartInstance.destroy()
})

definePageMeta({ layout: 'admin' })
</script>
