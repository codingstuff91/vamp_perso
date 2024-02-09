<script setup>
import Power from "@/Pages/Character/Partials/Power.vue";
import DescriptionModal from "@/Components/Modals/DescriptionModal.vue";
import { useModalStore } from "@/Stores/modalStore.js";
const modalStore = useModalStore();

const props = defineProps({
    character: Object,
    disciplines : Object,
});

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.setModalStatus();
}
</script>

<template>
    <div class="py-2">
        <transition name="fade">
            <DescriptionModal v-if="modalStore.open"/>
        </transition>
        <div class="flex justify-center">
            <h1 class="section_title text-2xl text-red-500 mt-2 mb-4">Disciplines</h1>
        </div>
        <div v-for="(discipline, index) in disciplines" :key="index">
            <h1
                class="attribute_title my-2 text-2xl text-white pl-6 mb-2"
                @click="showDescription('discipline', discipline[0].discipline_id)"
            >
                {{ discipline[0].discipline.name }}
            </h1>
            <Power
                v-for="(power, index) in discipline"
                :key="index"
                :power="discipline[index]"
            />
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
