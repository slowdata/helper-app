<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>

    <Head title="Welcome" />

    <nav class="flex px-6 justify-between items-center shadow-sm bg-gray-100 dark:bg-gray-900">
        <h1 class="px-2.5 font-bold font-mono text-2xl border text-gray-500">H</h1>
        <div v-if="canLogin" class="py-4 font-bold">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>
            <template v-else>
                <Link :href="route('login')"
                    class="text-sm text-gray-700 dark:text-gray-500 underline">
                Log in</Link>
                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
            </template>
        </div>
    </nav>



    <main class="min-h-screen px-6 grid items-center bg-gray-50">
        <h1 class="leading-snug text-7xl md:text-9xl text-gray-600"><span
                class="text-5xl md:text-6xl">Helper</span> APP
            Collection</h1>
    </main>


</template>
