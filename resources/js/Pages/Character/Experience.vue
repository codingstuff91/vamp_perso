<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CharacterExperience from '@/Pages/Character/Partials/Experience.vue';
import {Head} from '@inertiajs/vue3';

defineProps({
    characters: Array,
});

</script>

<template>
    <Head title="Experience"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-center">
                <div class="flex flex-col">
                    <h1 class="attribute_title text-2xl leading-tight text-center">Attribution Experience</h1>
                </div>
            </div>
        </template>

        <div class="pb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center mx-4 my-4 px-4 py-2 bg-gray-600 rounded-lg">
                    <h1>Attribution des points d'experience</h1>

                </div>
                <div v-for="character in characters" :key="character.id">
                    <CharacterExperience :character="character"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
