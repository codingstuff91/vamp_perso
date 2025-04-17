<script setup>
import {useModalStore} from "@/Stores/modalStore.js";
import Badge from '@/Components/Badge.vue';
import SecondaryButton from "@/Components/SecondaryButton.vue";

const modalStore = useModalStore();

const props = defineProps({
    power: Object,
    selectable: Boolean
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
            <img alt="dice" class="w-12 h-12" src="/img/dice.png">

            <p class="text-skin-50 text-2xl font-bold text-center lg:text-2xl">
                {{ power.dice_pool }}
            </p>
        </div>
        <div
            v-if="props.selectable"
            class="flex justify-center"
        >
            <secondary-button @click="$emit('selectPower')">
                Selectionner
            </secondary-button>
        </div>
    </div>
</template>
