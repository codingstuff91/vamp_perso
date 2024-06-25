<script setup>
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import {computed} from "vue";

import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";
import Foldable from "@/Components/Foldable.vue";

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
            :closeable="true"
            :show="modalStore.open"
        />
        <Foldable>
            <template #header>
                <div class="flex justify-center">
                    <h1 class="section_title my-4">Compétences</h1>
                </div>
            </template>

            <template #content>
                <div class="grid grid-cols-3 gap-x-2 justify-center px-2 pb-4 w-full">
                    <div class="flex flex-col">
                        <h2 class="column_title">Physiques</h2>
                        <div v-for="(attribute, index) in physical_skills" :key="index"
                             class="flex flex-col items-start">
                            <p
                                class="mt-2 attribute_title"
                                @click="showDescription('attribute', attribute.id)"
                            >
                                {{ attribute.name }}
                            </p>
                            <AttributeGauge
                                :max="5"
                                :value="attribute.pivot.attribute_value"
                            />
                            <p class="my-2 text-skin-50 text-sm lg:text-lg">
                                {{ attribute.pivot.specialties }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="column_title">Sociales</h2>
                        <div v-for="(attribute, index) in social_skills" :key="index"
                             class="flex flex-col items-center">
                            <p
                                class="my-2 attribute_title"
                                @click="showDescription('attribute', attribute.id)"
                            >
                                {{ attribute.name }}
                            </p>
                            <AttributeGauge
                                :max="5"
                                :value="attribute.pivot.attribute_value"
                            />
                            <p class="mt-2 text-skin-50 text-sm lg:text-lg">
                                {{ attribute.pivot.specialties }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <h2 class="column_title">Mentales</h2>
                        <div v-for="(attribute, index) in mental_skills" :key="index" class="flex flex-col items-end">
                            <p class="mt-2 attribute_title" @click="showDescription('attribute', attribute.id)">
                                {{ attribute.name }}</p>
                            <AttributeGauge
                                :max="5"
                                :value="attribute.pivot.attribute_value"
                            />
                            <p class="text-skin-50 text-sm lg:text-lg">
                                {{ attribute.pivot.specialties }}
                            </p>
                        </div>
                    </div>
                </div>
            </template>
        </Foldable>
    </div>
</template>
