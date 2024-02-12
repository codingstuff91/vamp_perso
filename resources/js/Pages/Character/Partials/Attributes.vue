<script setup>
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import DescriptionModal from "@/Components/Modals/DescriptionModal.vue";
import { useModalStore } from "@/Stores/modalStore.js";
const modalStore = useModalStore();

import { computed } from "vue";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

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

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.setModalStatus();
}

const closeModal = () => {
    modalStore.open = false
}
</script>

<template>
    <div class="py-2">
<!--        <transition name="fade">-->
<!--            <DescriptionModal v-if="modalStore.open"/>-->
<!--        </transition>-->
        <DetailsModal
            :show="modalStore.open"
            :closeable="true"
            @close="closeModal"
        />

        <div class="flex justify-center">
            <h1 class="section_title my-4">Attributs</h1>
        </div>
        <div class="grid grid-cols-3 gap-2 flex justify-center px-2 pb-4 w-full">
            <div class="flex flex-col">
                <h2 class="column_title">Physiques</h2>
                <div class="flex flex-col items-start" v-for="(attribute, index) in physical_attributes" :key="index">
                    <p class="mt-8 mb-2 attribute_title" @click="showDescription('attribute', attribute.id)">{{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                </div>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="column_title">Sociaux</h2>
                <div class="flex flex-col items-center" v-for="(attribute, index) in social_attributes" :key="index">
                    <p class="mt-8 mb-2 attribute_title" @click="showDescription('attribute', attribute.id)">{{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                </div>
            </div>
            <div class="flex flex-col items-end">
                <h2 class="column_title">Mentaux</h2>
                <div class="flex flex-col items-end" v-for="(attribute, index) in mental_attributes" :key="index">
                    <p class="mt-8 mb-2 attribute_title" @click="showDescription('attribute', attribute.id)">{{ attribute.name }}</p>
                    <AttributeGauge
                        :value="attribute.pivot.attribute_value"
                        :max="5"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
