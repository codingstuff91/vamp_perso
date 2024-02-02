<template>
    <div class="flex justify-start flex-wrap">
        <div v-for="(item, index) in max" :key="index">
            <template v-if="index <= selectedPoints">
                <i :class="`mx-1 text-lg ${icon} ${color}`" @click="setValue(index)"></i>
            </template>
            <template v-else>
                <i :class="`mx-1 text-lg ${icon} text-gray-400`" @click="setValue(index)"></i>
            </template>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

let remainingPoints = ref(0);
let selectedPoints = ref(0);

const color = "text-blood-500";
const icon = "fa-solid fa-droplet"

onMounted(() => {
    setGaugeValue(props.value, props.max);
});

const props = defineProps({
    value: Number,
    max: Number,
    editable: {
        type: Boolean,
        default: false,
    },
    attribute: Number,
    character_id: Number,
    color: {
        type: String,
        default: 'text-gray-700',
    },
});
const setValue = (index) => {
    if (! props.editable) {
        return false;
    }

    remainingPoints.value = calculateRemainingPoints(index);
    selectedPoints.value = index;

    let newValue = parseInt(index + 1);

    axios.patch(`/character/${props.character_id}/attribute/${props.attribute}`, {
        newScore: newValue,
    }).then((response) => {
        console.log(response.data);
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
