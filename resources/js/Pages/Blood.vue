<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blood pressure records</h2>
        </template>

        <div class="m-2 grid content-center border border-gray-300 rounded-md overflow-hidden">

            <table class="min-w-full table-fixed text-sm bg-white">
                <thead class="h-12 bg-gray-50 text-left border-b">
                <tr class="">
                    <th class="px-4 ">Date</th>
                    <th class="px-4">High Value</th>
                    <th class="px-4">Low Value</th>
                    <th class="px-4">Bps</th>
                </tr>
                </thead>
                <tbody class="h-28 divide-y divide-gray-100 text-md">
                <tr class="hover:bg-gray-100">
                    <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new Date) }}</td>
                    <td class="px-4">12</td>
                    <td class="px-4">6.5</td>
                    <td class="px-4">74</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new Date) }}</td>
                    <td class="px-4">12</td>
                    <td class="px-4">6.5</td>
                    <td class="px-4">74</td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new Date) }}</td>
                    <td class="px-4">12</td>
                    <td class="px-4">6.5</td>
                    <td class="px-4">74</td>
                </tr>

                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
