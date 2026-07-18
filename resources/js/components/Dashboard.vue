<script setup>

import { Pie, Bar } from 'vue-chartjs'

import {
    Chart as ChartJS,
    ArcElement,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend
} from 'chart.js'


ChartJS.register(
    ArcElement,
    BarElement,
    CategoryScale,
    LinearScale,
    Tooltip,
    Legend
)


const props = defineProps({
    stats: Object
})


const categoryChart = {

    labels: props.stats.categories.map(
        item => item.category_name
    ),

    datasets:[
        {
            label: 'Favoritos',

            data: props.stats.categories.map(
                item => item.total
            ),

            backgroundColor:[
                '#ef4444',
                '#3b82f6',
                '#22c55e',
                '#eab308',
                '#a855f7',
                '#f97316'
            ]
        }
    ]
}



const productChart = {

    labels: props.stats.products.map(
        item => item.product_name
    ),

    datasets:[
        {
            label:'Favoritos',

            data: props.stats.products.map(
                item => item.total
            ),

            backgroundColor:'#3b82f6'
        }
    ]
}


</script>


<template>

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">


    <!-- Cards estadísticas -->

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">


        <div class="bg-white rounded-lg shadow p-6">

            <h2 class="text-gray-500">
                Usuarios activos
            </h2>

            <p class="text-4xl font-bold mt-3">
                {{ stats.activeUsers }}
            </p>

        </div>



        <div class="bg-white rounded-lg shadow p-6">

            <h2 class="text-gray-500">
                Precio promedio favoritos
            </h2>

            <p class="text-4xl font-bold mt-3">
                ${{ stats.averagePrice }}
            </p>

        </div>


    </div>



    <!-- Graficas -->


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


        <div 
            class="bg-white rounded-lg shadow p-5 
            min-w-[300px]"
        >

            <h2 class="font-bold mb-4">
                Categorías favoritas
            </h2>


            <div class="h-[300px] flex justify-center">

                <Pie 
                    :data="categoryChart"
                    :options="{
                        maintainAspectRatio:false
                    }"
                />

            </div>

        </div>



        <div 
            class="bg-white rounded-lg shadow p-5
            min-w-[300px]"
        >

            <h2 class="font-bold mb-4">
                Productos más agregados
            </h2>


            <div class="h-[300px]">

                <Bar
                    :data="productChart"
                    :options="{
                        maintainAspectRatio:false
                    }"
                />

            </div>

        </div>


    </div>


</div>


</template>