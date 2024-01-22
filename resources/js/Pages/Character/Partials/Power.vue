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
    <div class="px-2 py-4 mx-2 my-2 flex justify-between bg-gray-800 border border-red-500">
        <p class="text-white" @click="showDescription('power', power.id)">{{ power.name }}</p>
        <p class="text-red-500">{{ power.dice_pool }}</p>
        <p class="text-white">Lvl 1</p>
    </div>
</template>
