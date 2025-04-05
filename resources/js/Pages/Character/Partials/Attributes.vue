<script setup>
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import {useModalStore} from "@/Stores/modalStore.js";
import {computed} from "vue";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";
import Foldable from "@/Components/Foldable.vue";

const modalStore = useModalStore();

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
    await modalStore.toggle();
}

const goToImproveAttributePage = (attribute) => {
    window.location.href = `/character/${props.character.id}/attribute/${attribute.id}/improve`;
}
</script>

<template>
    <div class="py-2">
        <DetailsModal
            :closeable="true"
            :show="modalStore.open"
        />

        <Foldable :open="true">
            <template #header>
                <h1 class="section_title text-center my-2">Attributs</h1>
            </template>
            <template #content>
                <div class="grid grid-cols-3 gap-2 flex justify-center p-2 w-full border-b border-gray-700">
                    <div class="flex flex-col">
                        <h2 class="column_title">Physiques</h2>
                        <div
                            v-for="(attribute, index) in physical_attributes" :key="index"
                            class="flex flex-col items-start"
                        >
                            <div class="flex justify-center items-center gap-x-2">
                                <p
                                    class="my-2 attribute_title"
                                    @click="showDescription('attribute', attribute.id)"
                                >
                                    {{ attribute.name }}
                                </p>

                                <img
                                    v-if="attribute.pivot.attribute_value < 5"
                                    alt="level-up"
                                    class="w-8 h-8"
                                    src="/img/level.png"
                                    @click="goToImproveAttributePage(attribute)"
                                >
                            </div>
                            <AttributeGauge
                                :max="5"
                                :value="attribute.pivot.attribute_value"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="column_title">Sociaux</h2>
                        <div
                            v-for="(attribute, index) in social_attributes" :key="index"
                            class="flex flex-col items-center"
                        >
                            <div class="flex justify-center items-center gap-x-2">
                                <p
                                    class="my-2 attribute_title"
                                    @click="showDescription('attribute', attribute.id)"
                                >
                                    {{ attribute.name }}
                                </p>

                                <img
                                    v-if="attribute.pivot.attribute_value < 5"
                                    alt="level-up"
                                    class="w-8 h-8"
                                    src="/img/level.png"
                                    @click="goToImproveAttributePage(attribute)"
                                >
                            </div>
                            <AttributeGauge
                                :max="5"
                                :value="attribute.pivot.attribute_value"
                            />
                        </div>
                    </div>
                    <div class="flex flex-col items-end">
                        <h2 class="column_title">Mentaux</h2>
                        <div
                            v-for="(attribute, index) in mental_attributes" :key="index"
                            class="flex flex-col items-end"
                        >
                            <div class="flex justify-center items-center gap-x-2">
                                <p
                                    class="my-2 attribute_title"
                                    @click="showDescription('attribute', attribute.id)"
                                >
                                    {{ attribute.name }}
                                </p>

                                <img
                                    v-if="attribute.pivot.attribute_value < 5"
                                    alt="level-up"
                                    class="w-8 h-8"
                                    src="/img/level.png"
                                    @click="goToImproveAttributePage(attribute)"
                                >
                            </div>
                            <AttributeGauge
                                :max="5"
                                :value="attribute.pivot.attribute_value"
                            />
                        </div>
                    </div>
                </div>
            </template>
        </Foldable>
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
