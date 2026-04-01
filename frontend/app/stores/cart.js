import { defineStore } from 'pinia'

export const useCartStore = defineStore('cart', {
   // State (Save Data)
   state: () => ({
      items: [],
      name: '',
      price: '',
      payment: '',
      change: '',
      id_product: null,
   }),

   // Getters (Take Data From State)
   getters: {},

   // Actions (Function To Change Data)
   actions: {
      // Get Token
      getToken() {
         return localStorage.getItem('token')
      },

      // Index All
      async indexAll() {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/cart/indexAll`, {
               method: 'GET',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal mengambil semua data keranjang:', error)
         }
      },

      // Index
      async index() {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/cart/index`, {
               method: 'GET',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
            })
            const data = await response.json()
            console.log('Response:', data)
            console.log('Token:', this.getToken())
            if (data.success) {
               this.items = data.data.map((item) => ({
                  id_cart: item.id_cart,
                  id_product: item.id_product,
                  product_name: item.product_name,
                  payment: item.payment ?? null,
                  price: item.price,
                  change: item.change ?? null,
                  raw_price: parseFloat(String(item.price).replace(/[^0-9]/g, '')),
                  estimate: item.product?.estimate ?? null,
                  stock: 1,
                  total: item.price,
                  admin_name: item.admin_name ?? null,
                  time: item.time ?? item.created_at ?? null,
               }))
            }
            return data
         } catch (error) {
            console.error('Gagal mengambil data keranjang:', error)
         }
      },

      // Store
      addItem(product) {
         const existing = this.items.find((i) => i.id_product === product.id_product)
         if (existing) {
            existing.amount++
         } else {
            this.items.push({
               id_product: product.id_product,
               product_name: product.name,
               payment: '',
               price: product.price,
               change: '',
               raw_price: parseFloat(String(product.price).replace(/[^0-9]/g, '')),
               estimate: product.estimate,
               amount: 1,
               maxStock: product.stock,
               total: product.price,
            })
         }
      },

      // Destroy
      async destroy(id_cart) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/cart/destroy`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_cart }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menghapus item keranjang:', error)
         }
      },

      // Store All
      async storeAll(paymentAmount) {
         const config = useRuntimeConfig()

         if (this.items.length === 0) {
            return { success: false, message: 'Cart kosong' }
         }

         const results = []
         let hasError = false
         const token = localStorage.getItem('token')
         const totalPrice = this.items.reduce((sum, item) => sum + item.raw_price * item.amount, 0)
         const payment = parseInt(paymentAmount) || 0
         const change = Math.max(0, payment - totalPrice)
         const formatRupiah = (number) => `Rp ${number.toLocaleString('id-ID')}`

         for (const item of this.items) {
            const itemTotal = item.raw_price * item.amount
            try {
               const response = await fetch(`${config.public.apiKey}/cart/store`, {
                  method: 'POST',
                  headers: {
                     Authorization: `Bearer ${token}`,
                     'Content-Type': 'application/json',
                     Accept: 'application/json',
                  },
                  credentials: 'include',
                  body: JSON.stringify({
                     id_product: item.id_product,
                     payment: formatRupiah(payment),
                     price: formatRupiah(itemTotal),
                     change: formatRupiah(change),
                     stock: item.amount,
                  }),
               })

               const data = await response.json()

               if (!response.ok || !data.success) {
                  hasError = true
                  console.error(`Gagal simpan produk ${item.id_product}:`, data)
               } else {
                  results.push(data.data)
               }
            } catch (error) {
               hasError = true
               console.error(`Error produk ${item.id_product}:`, error)
            }
         }

         if (!hasError) this.clearCart()

         return {
            success: !hasError,
            message: hasError ? 'Sebagian item gagal disimpan' : 'Semua item berhasil disimpan!',
            data: results,
         }
      },

      // Clear Cart
      clearCart() {
         this.items = []
      },
   },
})
