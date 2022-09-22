<template>
    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-gray-200">
        <div class="min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <div class="flex flex-row items-center justify-between cursor-pointer" @click="updateOrdering('plate')">
                                <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider" :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                    Plate
                                </div>
                                <div class="select-none">
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'asc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'id',
                                    }">&uarr;</span>
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'desc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'id',
                                    }">&darr;</span>
                                </div>
                            </div>
                        </th>

                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <div class="flex flex-row items-center justify-between cursor-pointer" @click="updateOrdering('owner')">
                                <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider" :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                    Owner
                                </div>
                                <div class="select-none">
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'asc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'id',
                                    }">&uarr;</span>
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'desc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'id',
                                    }">&darr;</span>
                                </div>
                            </div>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <div class="flex flex-row items-center justify-between cursor-pointer" @click="updateOrdering('start_date')">
                                <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider" :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                    Start Date
                                </div>
                                <div class="select-none">
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'asc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'id',
                                    }">&uarr;</span>
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'desc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'id',
                                    }">&darr;</span>
                                </div>
                            </div>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <div class="flex flex-row items-center justify-between cursor-pointer" @click="updateOrdering('end_date')">
                                <div class="leading-4 font-medium text-gray-500 uppercase tracking-wider" :class="{ 'font-bold text-blue-600': orderColumn === 'id' }">
                                    End Date
                                </div>
                                <div class="select-none">
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'asc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'asc' && orderColumn === 'id',
                                    }">&uarr;</span>
                                    <span :class="{
                                    'text-blue-600': orderDirection === 'desc' && orderColumn === 'id',
                                    'hidden': orderDirection !== '' && orderDirection !== 'desc' && orderColumn === 'id',
                                    }">&darr;</span>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    <tr :key="plate" v-for="(plate) in plates">
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ plate.plate }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ plate.owner }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ plate.start_date }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ plate.end_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

/*
    AM_NOTE: pending topic to complete on this file
    - Search box filtering, by licence or by owner name
*/

import { onMounted, ref } from "vue";
import usePlates from "../../composables/plates";

export default {
    setup() {
        const orderColumn = ref('plate')
        const orderDirection = ref('asc')

        const { plates, getPlates } = usePlates()
        onMounted(() => {
            getPlates()
        })

        const updateOrdering = (column) => {
            orderColumn.value = column;
            orderDirection.value = (orderDirection.value === 'asc') ? 'desc' : 'asc';
            getPlates(orderColumn.value, orderDirection.value);
        }
        
        return { plates, getPlates, orderColumn, orderDirection, updateOrdering }
    }
}
</script>