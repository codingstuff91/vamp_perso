<script setup>
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import { computed } from "vue";



const props = defineProps({
    character: Object,
});

const physical_attributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'physical_attributes'
    });
});

const social_attributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'social_attributes'
    });
});

const mental_attributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'mental_attributes'
    });
});

</script>

<template>
    <div class="py-2">
        <div class="flex justify-center">
            <h1 class="title text-2xl text-red-500 mt-2 mb-4">Attributs</h1>
        </div>
        <div class="grid grid-cols-3 gap-2 flex justify-center px-2 pb-4 w-full">
            <div class="flex flex-col">
                <h2 class="attribute_category_title">Physiques</h2>
                <div class="flex flex-col items-start" v-for="(attribute, index) in physical_attributes" :key="index">
                    <p class="mt-4 attribute_title">{{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                </div>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="attribute_category_title">Sociaux</h2>
                <div class="flex flex-col items-center" v-for="(attribute, index) in social_attributes" :key="index">
                    <p class="mt-4 attribute_title">{{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                </div>
            </div>
            <div class="flex flex-col items-end">
                <h2 class="attribute_category_title">Mentaux</h2>
                <div class="flex flex-col items-end" v-for="(attribute, index) in mental_attributes" :key="index">
                    <p class="mt-4 attribute_title">{{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
