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

        <div class="pb-4 px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my-4 flex flex-col items-center">
                    <h1 class="section_title text-2xl">Attribution des XP</h1>
                    <ul class="mt-2">
                        <li class="my-2 text-skin-50 text-xl">1 pt pour le roleplay</li>
                        <li class="my-2 text-skin-50 text-xl">1 pt si le PJ a appris quelque chose</li>
                        <li class="my-2 text-skin-50 text-xl">1 pt si action majeure accomplie</li>
                        <li class="my-2 text-skin-50 text-xl">1 pt si le PJ a suivi ses valeurs</li>
                    </ul>
                </div>

                <div
                    v-for="character in characters" :key="character.id"
                    class="grid grid-cols-1 gap-4 sm:gap-2 sm:grid-cols-3 lg:gap-4 lg:grid-cols-4"
                >
                    <CharacterExperience :character="character"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
