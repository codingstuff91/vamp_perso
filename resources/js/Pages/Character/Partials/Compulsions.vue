<script setup>
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import {ref} from 'vue';
import {router} from '@inertiajs/vue3';

import {useCharacterStore} from "@/Stores/characterStore.js";
import {useCompulsionStore} from "@/Stores/CompulsionStore.js";

const characterStore = useCharacterStore();
const compulsionStore = useCompulsionStore();

const displayModal = ref(false);

const openModal = async () => {
    displayModal.value = true;
}

const closeModal = () => {
    displayModal.value = false;
}

const setRandomCompulsion = async () => {
    await compulsionStore.setRandomCompulsion(characterStore.character.id);

    await router.get(`/characters/${characterStore.character.id}`);

    displayModal.value = false;
}

const deleteCompulsion = async () => {
    await compulsionStore.deleteCompulsion(characterStore.character.id);

    await router.get(`/characters/${characterStore.character.id}`);

    displayModal.value = false;
}
</script>

<template>
    <div class="flex flex-col lg:block">
        <h2 class="attribute_title">Compulsion</h2>
        <div class="flex items-center">
            <p
                class="subtitle"
                @click="openModal"
            >
                {{ characterStore.character.compulsion ? characterStore.character.compulsion.name : 'Aucune' }}</p>
        </div>
    </div>

    <Modal
        :closeable="true"
        :show="displayModal"
        @close="closeModal"
    >
        <div class="my-4 flex justify-center">
            <SecondaryButton
                v-if="! characterStore.character.compulsion"
                @click="setRandomCompulsion"
            >
                Attribuer une compulsion
            </SecondaryButton>
        </div>
        <div
            v-if="characterStore.character.compulsion"
            class="p-4 flex flex-col items-center"
        >
            <h2
                class="header_attribute_title text-center uppercase"
            >
                {{ characterStore.character.compulsion.name }}
            </h2>
            <p
                class="subtitle text-justify"
                v-html="characterStore.character.compulsion.description"
            >
            </p>

            <SecondaryButton
                v-if="characterStore.character.compulsion"
                @click="deleteCompulsion"
            >
                Supprimer la compulsion
            </SecondaryButton>
        </div>
    </Modal>
</template>
