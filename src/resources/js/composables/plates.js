import { useRouter } from 'vue-router'
import { ref } from 'vue'

export default function usePlates() {
    const plates = ref([])
    const router = useRouter()
    

    const getPlates = async (
        order_column = 'plate',
        order_direction = 'asc'
    ) => {
        axios.get('/api/plate?' +
            'order_column=' + order_column +
            '&order_direction=' + order_direction)
            .then(response => {
                plates.value = response.data.data;
            })
    }

    const storePlate = async (plate) => {
        axios.post('/api/plate', plate)
            .then(response => {
                
                console.log('from handle submit', response);
                router.push({ name: 'plate.index' })
            })
    }

    return { plates, getPlates, storePlate }
}