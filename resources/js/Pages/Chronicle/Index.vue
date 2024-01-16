<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Card from "@/Pages/Chronicle/Partials/Card.vue";

const props = defineProps({
    chronicles: Array,
});
</script>

<template>
    <Head title="Choix de chronique" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h2 class="title text-xl text-gray-800 leading-tight">Choix de la chronique</h2>
                </div>
            </div>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="attribute_title">Cliquez sur la chronique souhaitée</h2>
                <div class="grid grid-cols-2 gap-2 overflow-hidden shadow-sm sm:rounded-lg">
                    <Card v-for="chronicle in props.chronicles" :chronicle="chronicle"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
