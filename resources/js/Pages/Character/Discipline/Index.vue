<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

import {useDisciplineStore} from "@/Stores/disciplineStore.js";
import {ref} from "vue";
import Power from "@/Pages/Character/Partials/Power.vue";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";
import {useModalStore} from "@/Stores/modalStore.js";

const disciplineStore = useDisciplineStore();

const modalStore = useModalStore();


const props = defineProps({
    disciplines: Array,
});

const powers = ref([]);

const getPowers = async (discipline) => {
    await disciplineStore.getPowers(discipline);
    powers.value = disciplineStore.powers;
};
</script>

<template>
    <DetailsModal
        :closeable="true"
        :show="modalStore.open"
    />

    <Head title="Disciplines"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-center">
                <div class="flex flex-col">
                    <h1 class="attribute_title text-2xl leading-tight text-center">Choix nouvelle discipline</h1>
                </div>
            </div>
        </template>

        <div class="pb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-center section_title my-4">Choisir une catégorie</h1>

                <div class="flex justify-between mt-8">
                    <div
                        v-for="discipline in disciplines"
                        :key="discipline.id"
                        class="py-2 px-4 bg-blood-500 rounded-lg"
                        @click="getPowers(discipline)"
                    >
                        <h2 class="text-white text-xl font-bold">
                            {{ discipline.name }}
                        </h2>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-x-4">
                    <Power
                        v-for="(power, index) in powers"
                        :key="index"
                        :power="power"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
