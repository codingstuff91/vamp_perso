<template>
    <div class="flex justify-start items-center mt-2 flex-wrap">
        <img
            class="w-10 h-10 cursor:pointer mr-2 lg:mr-4 lg:w-12 lg:h-12"
            src="/img/eraser.png"
            alt="eraser"
            @click="resetValue"
            v-if="erasable"
        >
        <div v-for="(item, index) in max" :key="index">
            <template v-if="index <= selectedPoints">
                <i :class="`mx-1 text-4xl ${icon} text-blood-500 lg:text-4xl`" @click="setValue(index)"></i>
            </template>
            <template v-else>
                <i :class="`mx-1 text-4xl ${icon} text-gray-400 lg:text-4xl`" @click="setValue(index)"></i>
            </template>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import {useCharacterStore} from "@/Stores/characterStore.js";
import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore.js";

const characterStore = useCharacterStore();
const attributesStore = useCharacterAttributesStore();

let remainingPoints = ref(0);
let selectedPoints = ref(0);

onMounted(() => {
    setGaugeValue(props.value, props.max);
});

const props = defineProps({
    editable: {
        type: Boolean,
        default: true,
    },
    erasable: {
        type: Boolean,
        default: true,
    },
    value: Number,
    max: Number,
    attribute: Number,
    icon: String,
});
const setValue = (index) => {
    if (!props.editable) {
        return false;
    }

    remainingPoints.value = calculateRemainingPoints(index);
    selectedPoints.value = index;

    let newValue = parseInt(index + 1);

    axios.put(`/character/${characterStore.character.id}/attribute/${props.attribute}`, {
        newScore: newValue,
    }).then(async () => {
        await attributesStore.getAttributes(characterStore.character);
    }).catch(error => console.log(error));
}

const resetValue = () => {
    selectedPoints.value = -1;

    axios.put(`/character/${characterStore.character.id}/attribute/${props.attribute}`, {
        newScore: 0,
    }).then(async () => {
        await attributesStore.getAttributes(characterStore.character);
    }).catch(error => console.log(error));
}

const calculateRemainingPoints = (value) => {
    return parseInt(props.max - value);
}

const setGaugeValue = (value) => {
    selectedPoints.value = parseInt(value - 1);
    remainingPoints.value = calculateRemainingPoints(value);
}
</script>
