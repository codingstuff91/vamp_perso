<script setup>
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";
import {onMounted} from "vue";
import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";

const attributesStore = useCharacterAttributesStore();
const maxWillpowerPoints = attributesStore.willPowerAttributes[2].pivot.attribute_value;

onMounted(() => {
    console.log("Willpower attributes", maxWillpowerPoints, attributesStore.willPowerAttributes[0].pivot.attribute_value, attributesStore.willPowerAttributes[1].pivot.attribute_value);
    console.log("Willpower store attributes", attributesStore.willPowerAttributes);
});
</script>

<template>
    <div>
        <h2 class="section_title text-center lg:mt-4">Volonté</h2>
        <div class="flex flex-col justify-center items-center px-2 py-4 w-full">
            <h2
                class="attribute_title"
                @click="$emit('getDescription', 'attribute', attributesStore.willPowerAttributes[0].id)"
            >
                {{ attributesStore.willPowerAttributes[0].name }}
            </h2>
            <DynamicGauge
                :attribute="attributesStore.willPowerAttributes[0].pivot.attribute_id"
                :value="attributesStore.willPowerAttributes[0].pivot.attribute_value"
                icon="fa-solid fa-shield"
                :max="maxWillpowerPoints"
            />
        </div>
        <div class="flex flex-col justify-center items-center px-2 pb-4 w-full">
            <h2
                class="attribute_title"
                @click="$emit('getDescription', 'attribute', attributesStore.willPowerAttributes[1].id)"
            >
                {{ attributesStore.willPowerAttributes[1].name }}
            </h2>
            <DynamicGauge
                :attribute="attributesStore.willPowerAttributes[1].pivot.attribute_id"
                :value="attributesStore.willPowerAttributes[1].pivot.attribute_value"
                icon="fa-solid fa-skull"
                :max="maxWillpowerPoints"
            />
        </div>
    </div>
</template>
