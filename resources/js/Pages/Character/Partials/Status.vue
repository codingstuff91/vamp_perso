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
            <DescriptionModal v-if="modalStore.open" />
        </transition>

        <Hunger @get-description="showDescription" />

        <div class="mt-4 grid grid-cols-1 gap-2 lg:grid-cols-3 lg:border-t lg:border-gray-700">
            <Willpower @get-description="showDescription" />

            <Health @get-description="showDescription" />

            <Humanity @get-description="showDescription" />
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
