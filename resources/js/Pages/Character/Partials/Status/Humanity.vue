<script setup>
import { computed } from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

const props = defineProps({
    character: Object,
});

const humanity_attributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'humanity'
    });
});

</script>

<template>
    <div>
        <h2 class="attribute_category_title text-2xl text-center">Humanité</h2>
        <div class="flex justify-center px-2 pb-4 w-full">
            <div class="flex flex-col items-center">
                <DynamicGauge
                    :value="humanity_attributes[0].pivot.attribute_value"
                    icon="fa-solid fa-cross text-3xl"
                    color="text-red-500"
                    :max="10"
                />
            </div>
        </div>
    </div>
</template>
