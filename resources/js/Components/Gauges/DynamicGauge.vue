<template>
    <div class="flex justify-start mt-2 flex-wrap">
        <div v-for="(item, index) in max" :key="index">
            <template v-if="index <= selectedPoints">
                <i :class="`mx-1 text-2xl ${icon} ${color}`" @click="setValue(index)"></i>
            </template>
            <template v-else>
                <i :class="`mx-1 text-2xl ${icon} text-gray-400`" @click="setValue(index)"></i>
            </template>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import {useCharacterStore} from "@/Stores/characterStore.js";
import { useCharacterAttributesStore } from "@/Stores/characterAttributesStore.js";

const characterStore = useCharacterStore();
const attributesStore = useCharacterAttributesStore();

let remainingPoints = ref(0);
let selectedPoints = ref(0);

onMounted(() => {
    setGaugeValue(props.value, props.max);
});

const props = defineProps({
    value: Number,
    max: Number,
    attribute: Number,
    icon : String,
    color: {
        type: String,
        default: 'text-gray-700',
    },
});
const setValue = (index) => {
    remainingPoints.value = calculateRemainingPoints(index);
    selectedPoints.value = index;

    let newValue = parseInt(index + 1);

    axios.patch(`/character/${characterStore.character.id}/attribute/${props.attribute}`, {
        newScore: newValue,
    }).then( async(response) => {
        await attributesStore.getAttributes(characterStore.character);
    }).catch(error => console.log(error));
}

const calculateRemainingPoints = (value) => {
    return parseInt(props.max - value);
}

const setGaugeValue = (value, max) => {
    selectedPoints.value = parseInt(value - 1);
    remainingPoints.value = calculateRemainingPoints(value);
}
</script>
