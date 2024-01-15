<script setup>
import { onBeforeMount, ref} from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import { useCharacterAttributesStore } from "@/Stores/characterAttributesStore";
import { useCharacterStore } from "@/Stores/characterStore.js";

const attributesStore = useCharacterAttributesStore();
const characterStore = useCharacterStore();

const characterAttributes = ref([]);
const healthAttributes = ref([]);

onBeforeMount(async () => {
    await attributesStore.getAttributes(characterStore.character);
    characterAttributes.value = attributesStore.attributes;

    healthAttributes.value = attributesStore.healthAttributes;
});

</script>

<template>
    <div>
        <h2 class="attribute_category_title text-2xl text-center">Santé</h2>
        <div class="px-2 pb-4 w-full">
            <div class="flex flex-col items-center">
                <p class="attribute_title">{{ healthAttributes }}</p>
            </div>
        </div>
    </div>
</template>
