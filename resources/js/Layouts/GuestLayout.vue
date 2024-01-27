<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-darkness-900">
        <div class="flex justify-center items-center">
            <img
                src="/img/dracula.png"
                class="rounded-full w-20 h-20 mr-2"
            >
            <h1 class="main_title">VAMP PERSO</h1>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-darkness-900 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
