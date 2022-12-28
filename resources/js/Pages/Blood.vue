<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';

let state = reactive({ showForm: false })

function toogleForm() {
    state.showForm = !state.showForm
}

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blood pressure records
            </h2>
        </template>

        <div class="p-2"><button @click="toogleForm" class="p-1 text-sm border border-gray-400 shadow-md 
            bg-gray-200 hover:bg-gray-300 rounded-sm">New
                record
                ➕</button></div>

        <div class="p-4" v-if="state.showForm">
            <form class="flex gap-x-2">
                <div class="flex items-center">
                    <label for="max" class="w-6 text-sm">High</label>
                    <input id="max" type="text"
                        class="ml-2 w-20 h-8 text-sm rounded-sm border-gray-400">
                </div>
                <div class="flex items-center">
                    <label for="low" class="w-6 text-sm">Low</label>
                    <input id="low" type="text"
                        class="ml-2 w-20 h-8 text-sm rounded-sm border-gray-400">
                </div>
                <div class="flex items-center">
                    <label for="bps" class="w-6 text-sm">Bps</label>
                    <input id="bps" type="text"
                        class="ml-2 w-20 h-8 text-sm rounded-sm border-gray-400">
                </div>
                <button type="submit" class="px-2 py-1 bg-gray-200 rounded-sm text-gray-600 border border-gray-400 
                    hover:bg-gray-300">Add</button>
            </form>
        </div>

        <div class="m-2 grid content-center border border-gray-300 rounded-sm overflow-hidden">

            <table class="min-w-full table-fixed text-sm bg-white">
                <thead class="h-12 bg-gray-50 text-left border-b">
                    <tr class="">
                        <th class="px-4 ">Date</th>
                        <th class="px-4">High Value</th>
                        <th class="px-4">Low Value</th>
                        <th class="px-4">Bps</th>
                    </tr>
                </thead>
                <tbody class="h-28 divide-y divide-gray-100">
                    <tr class="hover:bg-gray-100 text-xs">
                        <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new Date) }}
                        </td>
                        <td class="px-4">12</td>
                        <td class="px-4">6.5</td>
                        <td class="px-4">74</td>
                    </tr>
                    <tr class="hover:bg-gray-100 text-xs">
                        <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new Date) }}
                        </td>
                        <td class="px-4">12</td>
                        <td class="px-4">6.5</td>
                        <td class="px-4">74</td>
                    </tr>
                    <tr class="hover:bg-gray-100 text-xs">
                        <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new Date) }}
                        </td>
                        <td class="px-4">12</td>
                        <td class="px-4">6.5</td>
                        <td class="px-4">74</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
