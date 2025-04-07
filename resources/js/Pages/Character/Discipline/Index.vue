<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

import {useDisciplineStore} from "@/Stores/disciplineStore.js";
import {useModalStore} from "@/Stores/modalStore.js";
import {ref} from "vue";
import Power from "@/Pages/Character/Partials/Power.vue";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const disciplineStore = useDisciplineStore();
const modalStore = useModalStore();

const props = defineProps({
    disciplines: Array,
});

const powers = ref([]);
const selectedDiscipline = ref(null);
const disciplineDescription = ref(null);

const getPowers = async (discipline) => {
    await disciplineStore.getPowers(discipline);
    powers.value = disciplineStore.powers;

    selectDiscipline(discipline);
};

const selectDiscipline = (discipline) => {
    disciplineDescription.value = props.disciplines.filter(element => {
        return element.id === discipline.id
    })[0].description;

    selectedDiscipline.value = discipline.id;
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
                <h1 class="text-center section_title my-4">Choisissez une discipline</h1>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div
                        v-for="discipline in disciplines"
                        :key="discipline.id"
                        :class="{'desktop_menu_active' : selectedDiscipline === discipline.id}"
                        class="py-2 px-4 rounded-lg attribute_title"
                        @click="getPowers(discipline)"
                    >
                        <h2 class="">
                            {{ discipline.name }}
                        </h2>
                    </div>
                </div>

                <div
                    v-if="disciplineDescription"
                    class="my-4 subtitle text-justify"
                >
                    <h3 class="column_title my-4">Description</h3>
                    {{ disciplineDescription }}
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
