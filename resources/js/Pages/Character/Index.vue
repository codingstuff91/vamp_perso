<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import Character from "@/Components/Character.vue";

defineProps({
    characters: Array,
    chronicle: Object,
});

</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-center">
                <div class="flex flex-col">
                    <h1 class="attribute_title text-2xl leading-tight text-center">Personnages disponibles</h1>
                </div>
            </div>
        </template>

        <div class="pb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center mx-4 my-4 px-4 py-2 bg-gray-600 rounded-lg">
                    <h2 class="text-white">Chronique : </h2>
                    <h2 class="text-white ml-4">{{ chronicle }}</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                    <Character
                        v-for="character in characters"
                        :key="character.id"
                        :character="character"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
