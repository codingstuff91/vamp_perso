<script setup>
import {ref} from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";

const attributesStore = useCharacterAttributesStore();

const maxHumanityLevel = ref(10)
</script>

<template>
    <div class="mt-4 pb-10">
        <h2
            class="section_title text-center"
            @click="$emit('getDescription', 'attribute', attributesStore.humanityAttributes[0].id)"
        >
            Humanité :
            <span class=" text-skin-50">
                {{ attributesStore.humanityAttributes[0].pivot.attribute_value }}
            </span>
        </h2>
        <div class="flex justify-center px-2 py-4 w-full">
            <div class="flex flex-col items-center">
                <DynamicGauge
                    :value="attributesStore.humanityAttributes[0].pivot.attribute_value"
                    :editable="false"
                    icon="fa-solid fa-cross"
                    :max="maxHumanityLevel"
                    :erasable="false"
                />
            </div>
        </div>
    </div>
</template>
