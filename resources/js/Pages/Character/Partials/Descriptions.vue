<script setup>
const props = defineProps({
    character: Object,
});

</script>

<template>
    <div class="py-2 px-4">
        <h1 class="title text-center text-3xl">Descriptions</h1>
        <div class="mt-4 flex flex-col items-center">
            <h2 class="mt-4 title text-xl">Age apparent</h2>
            <p class="text-white text-justify text-lg">{{ character.apparent_age }}</p>

            <h2 class="mt-4 title text-xl">Age réel</h2>
            <p class="text-white text-justify text-lg">{{ character.true_age }}</p>

            <h2 class="mt-4 title text-xl">Date Etreinte</h2>
            <p class="text-white text-justify text-lg">{{ character.embrace_year }}</p>

            <h2 class="mt-4 title text-2xl">Apparence</h2>
            <p class="detail_text">{{ character.appearance }}</p>

            <h2 class="mt-4 title text-xl">Historique / Background</h2>
            <p class="detail_text">{{ character.background }}</p>
        </div>
    </div>
</template>
