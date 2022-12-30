<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

let state = reactive({ showForm: false })

const props = defineProps({
    measures: Object
})

const sorted_measures = props.measures.length && [...props.measures].sort(
    function (curr, next) {
        if (next.created_at > curr.created_at) {
            return 1
        } else {
            return -1
        }
    }
)


function toogleForm() {
    state.showForm = !state.showForm
}

const form = useForm({
    high: '',
    low: '',
    bps: ''
})

function submit() {
    form.post('/blood', {
        onSuccess: () => form.reset(),
        preserveState: false
    });
}

function handleDelete(id) {
    console.log(id)
    Inertia.delete(`/blood/measures/${id}`, {
        preserveState: false
    })
}

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="relative">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blood pressure records
                </h2>
                <div class="absolute -right-4 sm:-right-6 -bottom-10">
                    <button @click="toogleForm" class="p-1 w-12 h-12 rounded-full text-sm border border-gray-400 shadow-md
                                                        bg-gray-200 hover:bg-gray-300 ">
                        {{ toogleForm ? 'x' : '+' }}</button>
                </div>
            </div>
        </template>

        <div v-show="measures.length">
            <div class="p-4 relative" v-if="state.showForm">
                <div>
                    <form class="flex gap-2" @submit.prevent="submit">
                        <div class="flex items-center">
                            <label for="max" class="w-6 text-sm">High</label>
                            <input id="max" type="text"
                                class="ml-3 w-20 h-8 text-sm rounded-sm border-gray-400"
                                v-model="form.high">
                        </div>
                        <div class="flex items-center">
                            <label for="low" class="w-6 text-sm">Low</label>
                            <input id="low" type="text"
                                class="ml-2 w-20 h-8 text-sm rounded-sm border-gray-400"
                                v-model="form.low">
                        </div>
                        <div class="flex items-center">
                            <label for="bps" class="w-6 text-sm">Bps</label>
                            <input id="bps" type="text"
                                class="ml-2 w-20 h-8 text-sm rounded-sm border-gray-400"
                                v-model="form.bps">
                        </div>
                        <button type="submit" class="ml-2 px-2 py-1 bg-gray-200 rounded-sm text-gray-600 border border-gray-400
                            hover:bg-gray-300" :disabled="form.processing">Add</button>
                    </form>
                </div>
            </div>
            <div
                class="mt-6 sm:mx-2 grid content-center border border-gray-300 rounded-sm overflow-hidden">
                <table class="min-w-full table-fixed text-sm bg-white">
                    <thead class="h-12 bg-gray-50 text-left border-b">
                        <tr class="">
                            <th class="px-4 ">Date</th>
                            <th class="px-4">High Value</th>
                            <th class="px-4">Low Value</th>
                            <th class="px-4">Bps</th>
                            <th class="px-4"></th>
                        </tr>
                    </thead>
                    <tbody class="h-28 divide-y divide-gray-100">
                        <tr class="hover:bg-gray-100 text-xs" v-for="mesure in sorted_measures"
                            :key="mesure.id">
                            <td class="px-4">{{ new Intl.DateTimeFormat('pt-PT').format(new
        Date(mesure.created_at))
}}
                            </td>
                            <td class="px-4">{{ mesure.high }}</td>
                            <td class="px-4">{{ mesure.low }}</td>
                            <td class="px-4">{{ mesure.bps }}</td>
                            <td class="w-6">
                                <div class="flex justify-center">
                                    <button
                                        class="p-2 hover:shadow-md hover:bg-green-500 rounded-full">📝</button>
                                    <button
                                        class="p-2 hover:shadow-md hover:bg-red-400 rounded-full"
                                        @click="handleDelete(mesure.id)">✖️</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
