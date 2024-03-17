<script setup>
import Power from "@/Pages/Character/Partials/Power.vue";
import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const modalStore = useModalStore();

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-2">
        <DetailsModal
            :show="modalStore.open"
            :closeable="true"
        />

        <div class="flex justify-center">
            <h1 class="section_title text-2xl text-red-500 mt-4 mb-4">Backgrounds</h1>
        </div>
    </div>
</template>
