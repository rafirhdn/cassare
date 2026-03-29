import { defineStore } from 'pinia'

export const useProductStore = defineStore('product', {
   state: () => ({
      name: '',
      stock: '',
      price: '',
      description: '',
      photo: null,
      type: '',
      status: '',
      estimate: '',
      id_category: '',
   }),

   getters: {},

   actions: {
      getToken() {
         return localStorage.getItem('token')
      },

      getIdAdmin() {
         const admin = localStorage.getItem('admin')
         return admin ? JSON.parse(admin).id_admin : null
      },

      // Index
      async index() {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/product/index`, {
               method: 'GET',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  Accept: 'application/json',
               },
               credentials: 'include',
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal mengambil data produk:', error)
         }
      },

      // Store
      async store() {
         const config = useRuntimeConfig()
         try {
            const formData = new FormData()
            formData.append('name', this.name)
            formData.append('stock', this.stock)
            formData.append('price', this.price)
            formData.append('description', this.description)
            formData.append('photo', this.photo)
            formData.append('type', this.type)
            formData.append('status', this.status)
            formData.append('estimate', this.estimate)
            formData.append('id_category', this.id_category)

            const response = await fetch(`${config.public.apiKey}/product/store`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: formData,
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menambah produk:', error)
         }
      },

      // Show
      async show(id_product) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/product/show`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_product }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal mengambil detail produk:', error)
         }
      },

      // Update
      async update(id_product) {
         const config = useRuntimeConfig()
         try {
            const formData = new FormData()
            formData.append('id_product', id_product)
            formData.append('name', this.name)
            formData.append('stock', this.stock)
            formData.append('price', this.price)
            formData.append('description', this.description)
            formData.append('type', this.type)
            formData.append('status', this.status)
            formData.append('estimate', this.estimate)
            formData.append('id_category', this.id_category)

            if (this.photo) {
               formData.append('photo', this.photo)
            }

            const response = await fetch(`${config.public.apiKey}/product/update`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: formData,
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal memperbarui produk:', error)
         }
      },

      // Destroy
      async destroy(id_product) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/product/destroy`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_product }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menghapus produk:', error)
         }
      },
   },
})
