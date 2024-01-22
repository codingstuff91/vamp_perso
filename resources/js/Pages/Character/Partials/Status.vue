<script setup>
import Willpower from "@/Pages/Character/Partials/Status/Willpower.vue";
import Health from "@/Pages/Character/Partials/Status/Health.vue";
import Humanity from "@/Pages/Character/Partials/Status/Humanity.vue";
import Hunger from "@/Pages/Character/Partials/Status/Hunger.vue";
import DescriptionModal from "@/Components/Modals/DescriptionModal.vue";

import { useModalStore } from "@/Stores/modalStore.js";
const modalStore = useModalStore();

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

        <Willpower @get-description="showDescription"/>

        <Health />

        <Hunger />

        <Humanity />
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
