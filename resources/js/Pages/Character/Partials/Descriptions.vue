<script setup>
const props = defineProps({
    character: Object,
});

</script>

<template>
    <div class="py-2 px-4">
        <h1 class="section_title text-center mt-4">Descriptions</h1>
        <div class="mt-4 flex flex-col items-center">
            <div class="px-8 grid grid-cols-2 gap-2 w-full">
                <div class="text-left">
                    <h2 class="my-4 attribute_title text-center">Age apparent</h2>
                    <p class="subtitle text-center">{{ character.apparent_age }}</p>
                </div>
                <div class="text-right">
                    <h2 class="my-4 attribute_title text-center">Age réel</h2>
                    <p class="subtitle text-center">{{ character.true_age }}</p>
                </div>
            </div>

            <h2 class="my-4 attribute_title">Date Etreinte</h2>
            <p class="subtitle">{{ character.embrace_year }}</p>

            <h2 class="my-4 attribute_title">Apparence</h2>
            <p class="subtitle text-justify">{{ character.appearance }}</p>

            <h2 class="my-4 attribute_title">Historique / Background</h2>
            <p class="subtitle text-justify" v-html="character.background"></p>
        </div>
    </div>
</template>
