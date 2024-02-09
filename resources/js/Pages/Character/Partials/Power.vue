<script setup>
import { useModalStore } from "@/Stores/modalStore.js";
const modalStore = useModalStore();

defineProps({
    power : Object
})

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.setModalStatus();
}
</script>

<template>
    <div class="py-2 my-2 mx-2 flex flex-col bg-gray-800 border border-red-500 rounded-xl">
        <div class="flex flex-col items-center justify-between lg:flex">
            <p class="subtitle">Niveau {{ power.level }}</p>
            <p class="subtitle font-bold" @click="showDescription('power', power.id)">{{ power.name }}</p>
        </div>
        <p class="text-skin-50 text-lg text-center lg:text-2xl">{{ power.dice_pool }}</p>
    </div>
</template>
