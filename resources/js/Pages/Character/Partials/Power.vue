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
    <div class="px-2 py-2 my-2 mx-4 flex flex-col bg-gray-800 border border-red-500 rounded-xl">
        <div class="flex justify-between w-2/3 mx-auto">
            <p class="subtitle font-bold" @click="showDescription('power', power.id)">{{ power.name }}</p>
            <p class="subtitle">Niveau {{ power.level }}</p>
        </div>
        <p class="text-skin-50 text-lg text-center">{{ power.dice_pool }}</p>
    </div>
</template>
