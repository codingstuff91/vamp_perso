<script setup>
import Power from "@/Pages/Character/Partials/Power.vue";
import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const modalStore = useModalStore();

const props = defineProps({
    character: Object,
    disciplines: Object,
});

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="pt-2 pb-8">
        <DetailsModal
            :closeable="true"
            :show="modalStore.open"
        />

        <div
            v-if="props.character.user.role === 'game_master'"
            class="flex justify-center my-4"
        >
            <button
                class="desktop_menu_active flex items-center gap-4"
                @click="$inertia.get(`/character/${props.character.id}/powers`)"
            >
                <img class="size-8" src="/img/ajouter.png">
                Ajouter une discipline
            </button>
        </div>

        <div class="flex justify-center">
            <h1 class="section_title text-2xl text-red-500 mt-4 mb-4">Disciplines</h1>
        </div>
        <div v-for="(discipline, index) in disciplines" :key="index">
            <h1
                class="attribute_title my-4 text-2xl text-white pl-6 mb-2 sm:my-8"
                @click="showDescription('discipline', discipline[0].discipline_id)"
            >
                {{ discipline[0].discipline.name }}
            </h1>
            <div class="grid gap-0 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                <Power
                    v-for="(power, index) in discipline"
                    :key="index"
                    :power="discipline[index]"
                />
            </div>
        </div>
    </div>
</template>
