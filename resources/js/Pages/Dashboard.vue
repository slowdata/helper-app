<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-t-lg">
                    <div class="p-6 text-gray-900">These are your available services:</div>
                </div>

                <div class="p-2 bg-white overflow-hidden shadow-sm sm:rounded-b-lg">
                    <Link :href="`blood/${$page.props.auth.user.id}`"
                        class="block p-6 text-red-800 bg-red-200 hover:bg-red-300 rounded-sm">
                    Blood pressure
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
