<script setup>
const props = defineProps({
    character: Object,
});

</script>

<template>
    <div class="py-2 px-4">
        <h1 class="section_title text-center mt-4">Concepts</h1>
        <div class="flex flex-col items-center">
            <h2 class="attribute_title mt-4">Sire</h2>
            <p class="subtitle">{{ character.sire }}</p>

            <h2 class="attribute_title mt-4">Ambition</h2>
            <p class="subtitle text-justify">{{ character.ambition }}</p>

            <h2 class="attribute_title mt-4">Conviction</h2>
            <p class="subtitle text-justify text-lg">{{ character.conviction }}</p>

            <h2 class="attribute_title mt-4">Désir</h2>
            <p class="subtitle text-justify text-lg">{{ character.desire }}</p>

            <h2 class="attribute_title mt-4">Prédation</h2>
            <h3 class="text-blood-500 font-bold italic text-2xl mt-4">{{ character.predation.name }}</h3>
            <p class="subtitle text-justify">{{ character.predation.description }}</p>
        </div>
    </div>
</template>
