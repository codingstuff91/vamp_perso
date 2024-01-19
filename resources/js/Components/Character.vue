<script setup>
const props = defineProps({
    character: Object,
});
</script>

<template>
    <div class="character_card overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex items-center">
            <div class="mr-8">
                <img src="https://placehold.co/100x100" alt="">
            </div>
            <div>
                <h2>{{ character.name }}</h2>
                <h3>{{ character.clan.name }}</h3>
            </div>
        </div>
        <button class="p-2 mt-4 rounded-sm w-full bg-gray-600 text-chalk-50 text-lg font-bold">
            <a :href="route('characters.show', character.id)">Sélectionner</a>
        </button>
    </div>
</template>
