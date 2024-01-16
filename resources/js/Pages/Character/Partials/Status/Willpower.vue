<script setup>
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import { useCharacterAttributesStore } from "@/Stores/characterAttributesStore";

const attributesStore = useCharacterAttributesStore();
</script>

<template>
    <div>
        <h2 class="attribute_category_title text-2xl text-center">Volonté</h2>
        <div class="flex flex-col justify-center items-center px-2 pb-4 w-full">
            <h2 class="attribute_title">{{ attributesStore.willPowerAttributes[0].name }}</h2>
            <DynamicGauge
                :attribute="attributesStore.willPowerAttributes[0].pivot.attribute_id"
                :value="attributesStore.willPowerAttributes[0].pivot.attribute_value"
                icon="fa-solid fa-shield"
                color="text-red-500"
                :max="6"
            />
        </div>
        <div class="flex flex-col justify-center items-center px-2 pb-4 w-full">
            <h2 class="attribute_title">{{ attributesStore.willPowerAttributes[1].name }}</h2>
            <DynamicGauge
                :attribute="attributesStore.willPowerAttributes[1].pivot.attribute_id"
                :value="attributesStore.willPowerAttributes[1].pivot.attribute_value"
                icon="fa-solid fa-skull"
                color="text-red-500"
                :max="6"
            />
        </div>
    </div>
</template>
