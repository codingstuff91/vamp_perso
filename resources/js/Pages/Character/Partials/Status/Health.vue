<script setup>
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";
import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";

const attributesStore = useCharacterAttributesStore();

const maxHealthPoints = attributesStore.healthAttributes[2].pivot.attribute_value;
</script>

<template>
    <div>
        <h2 class="section_title mt-4 text-center">Santé</h2>
        <div class="flex flex-col justify-center items-center px-2 py-4 w-full">
            <h2
                class="attribute_title"
                @click="$emit('getDescription', 'attribute', attributesStore.healthAttributes[0].id)"
            >
                {{ attributesStore.healthAttributes[0].name }}
            </h2>
            <DynamicGauge
                :attribute="attributesStore.healthAttributes[0].pivot.attribute_id"
                :value="attributesStore.healthAttributes[0].pivot.attribute_value"
                icon="fa-solid fa-hand-fist"
                :max="maxHealthPoints"
            />
        </div>
        <div class="flex flex-col justify-center items-center px-2 pb-4 w-full">
            <h2
                class="attribute_title"
                @click="$emit('getDescription', 'attribute', attributesStore.healthAttributes[1].id)"
            >
                {{ attributesStore.healthAttributes[1].name }}
            </h2>
            <DynamicGauge
                :attribute="attributesStore.healthAttributes[1].pivot.attribute_id"
                :value="attributesStore.healthAttributes[1].pivot.attribute_value"
                icon="fa-solid fa-skull"
                :max="maxHealthPoints"
            />
        </div>
    </div>
</template>
