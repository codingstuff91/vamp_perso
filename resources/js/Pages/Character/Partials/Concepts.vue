<script setup>
const props = defineProps({
    character: Object,
});

</script>

<template>
    <div class="py-2 px-4">
        <h1 class="title text-center text-3xl">Concepts</h1>
        <div class="mt-4 flex flex-col items-center">
            <h2 class="mt-4 title text-2xl">Sire</h2>
            <p class="text-white text-lg">{{ character.sire }}</p>

            <h2 class="mt-4 title text-xl">Ambition</h2>
            <p class="text-white text-justify text-lg">{{ character.ambition }}</p>

            <h2 class="mt-4 title text-xl">Conviction</h2>
            <p class="text-white text-justify text-lg">{{ character.conviction }}</p>

            <h2 class="mt-4 title text-xl">Désir</h2>
            <p class="text-white text-justify text-lg">{{ character.desire }}</p>

            <h2 class="mt-4 title text-xl">Prédation</h2>
            <p class="attribute_title">{{ character.predation.name }}</p>
            <p class="detail_text">{{ character.predation.description }}</p>
        </div>
    </div>
</template>
