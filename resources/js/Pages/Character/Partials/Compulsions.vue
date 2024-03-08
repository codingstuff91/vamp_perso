<script setup>
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import {ref, onMounted} from 'vue';
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

const setRandomCompulsion = () => {
    compulsionStore.setRandomCompulsion(characterStore.character.id);
}
</script>

<template>
    <div class="flex flex-col lg:block">
        <h2 class="header_attribute_title">Compulsion</h2>
        <div class="flex items-center">
            <h2 class="subtitle">
                {{ characterStore.character.compulsion ? characterStore.character.compulsion.name : 'Aucune' }}</h2>
            <img src="/img/ajouter.png"
                 class="ml-4 w-8 h-8"
                 @click="openModal"
            >
        </div>
    </div>

    <Modal
        :show="displayModal"
        :closeable="true"
        @close="closeModal"
    >
        <h1 class="pt-4 section_title text-blood-500 text-center">Choix de compulsion</h1>
        <div class="mt-4 flex justify-center">
            <SecondaryButton
                @click="setRandomCompulsion"
                v-if="! characterStore.character.compulsion"
            >
                Attribuer une compulsion
            </SecondaryButton>
        </div>
    </Modal>
</template>
