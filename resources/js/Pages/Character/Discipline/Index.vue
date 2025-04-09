<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

import {useDisciplineStore} from "@/Stores/disciplineStore.js";
import {useModalStore} from "@/Stores/modalStore.js";
import {ref} from "vue";
import Power from "@/Pages/Character/Partials/Power.vue";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const disciplineStore = useDisciplineStore();
const modalStore = useModalStore();

const props = defineProps({
    disciplines: Array,
    character: Object,
    characterPowers: Array,
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

    selectedDiscipline.value = discipline;
};

const isNewForCharacter = (power) => {
    if (powers.value.length) {
        return props.characterPowers.includes(power.id) === false;
    }
};

const isPowerBelongsToCharacterClan = (power) => {
    return props.clanDisciplines.includes(power.name);
};

const confirmPowerAttribution = (power) => {
    const powerBelongsToCharacterClan = isPowerBelongsToCharacterClan(selectedDiscipline.value.name);
    const experiencePointsMultiplier = powerBelongsToCharacterClan ? 5 : 7;
    const requiredExperiencePoints = power.level * experiencePointsMultiplier;

    if (confirm(`Voulez vous dépenser ${requiredExperiencePoints} pts d\'exp pour ajouter cette discipline ?`)) {
        disciplineStore.associatePower(props.character, power, requiredExperiencePoints)
            .then(() => {
                window.location.href = `/character/${props.character.id}/powers`;
            })
            .catch((exception) => {
                alert(exception.response.data.message);
            });
    }
}
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
                <div class="flex flex-col items-center gap-y-2">
                    <h1 class="attribute_title leading-tight">Choix nouvelle discipline</h1>
                    <h2 class="text-skin-50 text-2xl font-bold">
                        Points XP restants : <span class="subtitle">{{ props.character.experience_points }}</span>
                    </h2>
                </div>
            </div>
        </template>

        <div class="pb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <primary-button
                    class="my-4"
                    @click="$inertia.get(`/characters/${props.character.id}`)"
                >
                    Revenir au personnage
                </primary-button>
                <h1 class="text-center section_title my-4">Choisissez une discipline</h1>

                <div class="my-4 flex flex-col items-center gap-y-2">
                    <h2 class="subtitle">Cout en points d'experience</h2>
                    <p class="text-skin-50 text-2xl font-bold">
                        Pour une discipline de votre clan : Niveau souhaité x 5
                    </p>
                    <p class="text-gray-400 text-2xl font-bold">
                        Pour une discipline hors clan : Niveau souhaité x 7
                    </p>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div
                        v-for="discipline in disciplines"
                        :key="discipline.id"
                        :class="{
                            'bg-blood-500' : selectedDiscipline?.id === discipline.id,
                            'text-2xl text-skin-50': isPowerBelongsToCharacterClan(discipline)
                        }"
                        class="py-2 px-4 rounded-lg font-bold text-gray-400 text-2xl cursor-pointer text-center"
                        @click="getPowers(discipline)"
                    >
                        <h2>
                            {{ discipline.name }}
                        </h2>
                    </div>
                </div>

                <div
                    v-if="selectedDiscipline"
                    class="my-4 subtitle text-justify"
                >
                    <h3 class="column_title my-4 text-center">{{ selectedDiscipline.name }}</h3>
                    <p v-html="disciplineDescription"></p>
                </div>

                <div class="grid grid-cols-3 gap-x-4">
                    <Power
                        v-for="power in powers"
                        v-show="isNewForCharacter(power)"
                        :key="power.id"
                        :power="power"
                        :selectable="true"
                        @selectPower="confirmPowerAttribution(power)"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
