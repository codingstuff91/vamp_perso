<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({
    character: Object,
});

const goToCharacter = () => {
    router.get("characters/" + props.character.id);
}
</script>

<template>
    <div class="character_card overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex items-center">
            <div class="mt-2 ml-4 mr-8">
                <img
                    src="/img/dracula.png"
                    class="rounded-full w-28 h-28"
                >
            </div>
            <div>
                <h2>{{ character.name }}</h2>
                <h3>{{ character.clan.name }}</h3>
            </div>
        </div>
        <button
            class="p-2 mt-4 rounded-lg w-full bg-gray-700 text-chalk-50 text-lg font-bold"
            @click="goToCharacter"
        >
            Sélectionner
        </button>
    </div>
</template>
