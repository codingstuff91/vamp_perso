<script setup>
import { onMounted, ref } from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import { useCharacterAttributesStore } from "@/Stores/characterAttributesStore";
import { useCharacterStore } from "@/Stores/characterStore.js";

const attributesStore = useCharacterAttributesStore();
const characterStore = useCharacterStore();

const characterAttributes = ref([]);
const willPowerAttributes = ref([]);

onMounted(async () => {
    await attributesStore.getAttributes(characterStore.character);
    characterAttributes.value = attributesStore.attributes;

    willPowerAttributes.value = attributesStore.willPowerAttributes;
});
</script>

<template>
    <div>
        <h2 class="attribute_category_title text-2xl text-center">Volonté</h2>
        <div class="flex flex-col justify-center px-2 pb-4 w-full">
            <div class="flex flex-col items-center" v-for="attribute in willPowerAttributes">
                <h2 class="attribute_title">{{ attribute.name }}</h2>
                <DynamicGauge
                    :value="attribute.pivot.attribute_value"
                    :character="characterStore.character"
                    :attribute="attribute.id"
                    icon="fa-solid fa-shield"
                    color="text-red-500"
                    :max="10"
                />
            </div>
        </div>
    </div>
</template>
