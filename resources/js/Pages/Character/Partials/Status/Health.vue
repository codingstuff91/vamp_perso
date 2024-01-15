<script setup>
import { computed } from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

const props = defineProps({
    character: Object,
});

const health_attributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'health'
    });
});

</script>

<template>
    <div>
        <h2 class="attribute_category_title text-2xl text-center">Santé</h2>
        <div class="px-2 pb-4 w-full">
            <div class="flex flex-col items-center">
                <p class="attribute_title">{{ health_attributes[0].name }}</p>
                <DynamicGauge
                    :value="health_attributes[0].pivot.attribute_value"
                    icon="fa-solid fa-hand-fist"
                    color="text-blue-500"
                    :max="10"
                />
            </div>
            <div class="flex flex-col items-center">
                <p class="attribute_title">{{ health_attributes[1].name }}</p>
                <DynamicGauge
                    :value="health_attributes[1].pivot.attribute_value"
                    icon="fa-solid fa-fire"
                    color="text-orange-500"
                    :max="10"
                />
            </div>
        </div>
    </div>
</template>
