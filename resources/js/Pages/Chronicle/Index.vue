<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import Chronicle from "@/Pages/Chronicle/Partials/Chronicle.vue";

const props = defineProps({
    chronicles: Array,
    user: Object,
});
</script>

<template>
    <Head title="Choix de chronique" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h2 class="header_attribute_title text-xl leading-tight">Choix de la chronique</h2>
                </div>
            </div>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <Chronicle
                        v-for="chronicle in props.chronicles"
                        :chronicle="chronicle"
                        :user="props.user"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
