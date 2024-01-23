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
        </div>
    </div>
</template>
