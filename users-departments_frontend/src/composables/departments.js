import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useCompanies() {
    const department = ref([])
    const departments = ref([])

    const errors = ref('')
    const router = useRouter()

    const getDepartments = async () => {
        let response = await axios.get('/api/departments')
        departments.value = response.data.data
    }

    const getDepartment = async (id) => {
        let response = await axios.get(`/api/departments/${id}`)
        department.value = response.data.data
    }

    const storeDepartment = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/departments', data)
            await router.push({ name: 'departments.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateDepartment = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/departments/${id}`, department.value)
            await router.push({ name: 'departments.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }


    const destroyDepartment = async (id) => {
        await axios.delete('/api/departments/' + id)
    }


    return {
        errors,
        department,
        departments,
        getDepartment,
        getDepartments,
        storeDepartment,
        updateDepartment,
        destroyDepartment
    }
}