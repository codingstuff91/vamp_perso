<script setup>
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import {computed} from "vue";

import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const modalStore = useModalStore();

const props = defineProps({
    character: Object,
});

const physical_skills = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'physical_skills'
    });
});

const social_skills = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'social_skills'
    });
});

const mental_skills = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category == 'mental_skills'
    });
});

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-2 pb-16">
        <DetailsModal
            :show="modalStore.open"
            :closeable="true"
        />

        <div class="flex justify-center">
            <h1 class="section_title my-4">Compétences</h1>
        </div>
        <div class="grid grid-cols-3 gap-2 flex justify-center px-2 pb-4 w-full">
            <div class="flex flex-col">
                <h2 class="column_title">Physiques</h2>
                <div class="flex flex-col items-start" v-for="(attribute, index) in physical_skills" :key="index">
                    <p
                        class="mt-8 mb-2 attribute_title"
                        @click="showDescription('attribute', attribute.id)"
                    >
                        {{ attribute.name }}
                    </p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                    <p class="mt-2 text-skin-50 text-sm lg:text-lg">
                        {{ attribute.pivot.specialties }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="column_title">Sociales</h2>
                <div class="flex flex-col items-center" v-for="(attribute, index) in social_skills" :key="index">
                    <p
                        class="mt-8 mb-2 attribute_title"
                        @click="showDescription('attribute', attribute.id)"
                    >
                        {{ attribute.name }}
                    </p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                    <p class="mt-2 text-skin-50 text-sm lg:text-lg">
                        {{ attribute.pivot.specialties }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-end">
                <h2 class="column_title">Mentales</h2>
                <div class="flex flex-col items-end" v-for="(attribute, index) in mental_skills" :key="index">
                    <p class="mt-8 mb-2 attribute_title" @click="showDescription('attribute', attribute.id)">
                        {{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                    <p class="mt-2 text-skin-50 text-sm lg:text-lg">
                        {{ attribute.pivot.specialties }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
