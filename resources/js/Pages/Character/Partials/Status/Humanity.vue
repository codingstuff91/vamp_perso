<script setup>
import {computed} from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";

const attributesStore = useCharacterAttributesStore();

const props = defineProps({
    witheringLevel: Number,
    humanityScore: Number,
});

const maxWitheringLevel = computed(() => {
    return 10 - props.humanityScore
});
</script>

<template>
    <div class="mt-4 pb-10">
        <h2
            class="section_title text-center"
            @click="$emit('getDescription', 'attribute', attributesStore.humanityAttributes[0].id)"
        >
            Flétrissures
        </h2>
        <div class="flex justify-center px-2 py-4 w-full">
            <div class="flex flex-col items-center">
                <DynamicGauge
                    :max="maxWitheringLevel"
                    :value="witheringLevel"
                    attribute="45"
                    icon="fa-solid fa-notes-medical"
                />
            </div>
        </div>
    </div>
</template>
