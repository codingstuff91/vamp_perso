<script setup>
import {useModalStore} from "@/Stores/modalStore.js";
import Badge from '@/Components/Badge.vue';

const modalStore = useModalStore();

defineProps({
    power: Object
})

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-2 my-2 mx-2 flex flex-col bg-gray-800 border border-red-500 rounded-xl">
        <div class="px-4 pt-2 flex justify-between items-center">
            <Badge :level="power.level"/>

            <h2
                class="text-2xl text-chalk-50 font-bold"
                @click="showDescription('power', power.id)"
            >
                {{ power.name }}
            </h2>
        </div>
        <div class="mt-4 flex flex-col items-center">
            <img src="/img/dice.png" class="w-8 h-8">

            <p class="text-skin-50 text-lg font-bold text-center lg:text-2xl">
                {{ power.dice_pool }}
            </p>
        </div>
    </div>
</template>
