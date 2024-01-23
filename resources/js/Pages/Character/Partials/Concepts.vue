<script setup>
import { useCharacterConceptsStore } from "@/Stores/characterConceptsStore.js";
import { useCharacterStore } from "@/Stores/characterStore.js";
const conceptsStore = useCharacterConceptsStore();
const characterStore = useCharacterStore();

const formatTitle = (title) => {
    return title.charAt(0).toUpperCase() + title.slice(1);
}

</script>

<template>
    <div class="py-2 px-4">
        <h1 class="section_title text-center mt-4">Concepts</h1>
        <div class="flex flex-col items-center">
            <div v-for="concept in conceptsStore.concepts">
                <h2 class="attribute_title mt-4 text-center">{{ formatTitle(concept.name) }}</h2>
                <p class="subtitle">{{ concept.pivot.concept_value }}</p>
            </div>

            <h2 class="attribute_title mt-4">Prédation</h2>
            <h3 class="text-blood-500 font-bold italic text-2xl mt-4">{{ characterStore.character.predation.name }}</h3>
            <p class="subtitle text-justify">{{ characterStore.character.predation.description }}</p>
        </div>
    </div>
</template>
