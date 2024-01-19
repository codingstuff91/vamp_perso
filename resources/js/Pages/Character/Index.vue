<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Character from "@/Components/Character.vue";

defineProps({
    characters: Array,
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h1 class="attribute_title text-2xl leading-tight">Personnages disponibles</h1>
                </div>
            </div>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Character
                    v-for="character in characters"
                    :key="character.id"
                    :character="character"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
