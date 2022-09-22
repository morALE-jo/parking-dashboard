<template>
    <form @submit.prevent="storePlate(plate)">
        <!-- Plate -->
        <div>
            <label for="plate" class="block font-medium text-sm text-gray-700">
                Licence Plate
            </label>
            <input v-model="plate.plate" id="plate" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- Owner -->
        <div class="mt-4">
            <label for="owner" class="block font-medium text-sm text-gray-700">
                Owner
            </label>
            <input v-model="plate.owner" id="owner" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- Start Date TBD: add datepicker -->
        <div class="mt-4">
            <label for="start_date" class="block font-medium text-sm text-gray-700">
                Start Date
            </label>
            <input v-model="plate.start_date" id="start_date" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- End Date TBD: add datepicker -->
        <div class="mt-4">
            <label  for="end_date" class="block font-medium text-sm text-gray-700">
                End Date
            </label>
            <input v-model="plate.end_date" id="end_date" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <!-- Buttons -->
        <div class="mt-4">
            <button class="px-3 py-2 bg-blue-600 text-white rounded">Save</button>
        </div>
    </form>
</template>

<script>
import { reactive } from "vue";
import usePlates from "../../composables/plates";
/*
    AM_NOTE: pending topic to complete on this file
    - add datepickers
    - add error feedback
*/
export default {
    setup() {
        const plate = reactive({
            plate: '',
            owner: '',
            start_date: '',
            end_date: ''
        })
        const { storePlate } = usePlates()
        return { plate, storePlate }
    }
}
</script>