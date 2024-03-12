<script setup>
import {useCharacterConceptsStore} from "@/Stores/characterConceptsStore.js";
import {useModalStore} from "@/Stores/modalStore.js";

import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const conceptsStore = useCharacterConceptsStore();
const modalStore = useModalStore();

const formatTitle = (title) => {
    return title.charAt(0).toUpperCase() + title.slice(1);
}

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-2 px-4">
        <DetailsModal
            :show="modalStore.open"
            :closeable="true"
        />

        <h1 class="section_title text-center mt-4">Concepts</h1>
        <div class="flex flex-col items-center">
            <div v-for="concept in conceptsStore.concepts">
                <h2
                    class="attribute_title mt-6 text-center"
                    @click="showDescription('concept', concept.id)"
                >
                    {{ formatTitle(concept.name) }}
                </h2>
                <p class="subtitle mt-2">{{ concept.pivot.concept_value }}</p>
            </div>
        </div>
    </div>
</template>
