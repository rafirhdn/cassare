import { defineStore } from 'pinia'

export const useCashierStore = defineStore('cashier', {
   // State (Save Data)
   state: () => ({
      name: '',
      email: '',
      password: '',
   }),

   // Getters (Take Data From State)
   getters: {},

   // Actions (Function To Change Data)
   actions: {
      // Get Token
      getToken() {
         return localStorage.getItem('token')
      },

      // Index
      async index() {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/admin/index`, {
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
            console.error('Gagal mengambil data kasir:', error)
         }
      },

      // Store
      async store() {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/admin/store`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({
                  name: this.name,
                  email: this.email,
                  password: this.password,
               }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menambah kasir:', error)
         }
      },

      // Show
      async show(id_admin) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/admin/show`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_admin }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal mengambil detail kasir:', error)
         }
      },

      // Update
      async update(id_admin) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/admin/update`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({
                  id_admin,
                  name: this.name,
                  email: this.email,
                  password: this.password,
               }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal memperbarui kasir:', error)
         }
      },

      // Destroy
      async destroy(id_admin) {
         const config = useRuntimeConfig()
         try {
            const response = await fetch(`${config.public.apiKey}/admin/destroy`, {
               method: 'POST',
               headers: {
                  Authorization: `Bearer ${this.getToken()}`,
                  'Content-Type': 'application/json',
                  Accept: 'application/json',
               },
               credentials: 'include',
               body: JSON.stringify({ id_admin }),
            })
            const data = await response.json()
            return data
         } catch (error) {
            console.error('Gagal menghapus kasir:', error)
         }
      },
   },
})
