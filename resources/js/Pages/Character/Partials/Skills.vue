<script setup>
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import {computed} from "vue";

import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";
import Foldable from "@/Components/Foldable.vue";
import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore.js";

const modalStore = useModalStore();
const attributeStore = useCharacterAttributesStore();

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
        <Foldable>
            <template #header>
                <div class="flex justify-center">
                    <h1 class="section_title my-2">Compétences</h1>
                </div>
            </template>

            <template #content>
                <div class="grid grid-cols-3 gap-2 flex justify-center px-2 pb-4 w-full">
                    <div class="flex flex-col">
                        <h2 class="column_title mb-1">Physiques</h2>
                        <div
                            v-for="(attribute, index) in physical_skills"
                            :key="index"
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
                                    v-if="attribute.pivot.attribute_value < 5 && $page.props.auth.user.role === 'game_master'"
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

                            <p
                                v-if="attribute.pivot.specialties"
                                class="my-2 text-skin-50 text-sm lg:text-lg"
                            >
                                {{ attribute.pivot.specialties }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center">
                        <h2 class="column_title mb-1">Sociales</h2>
                        <div
                            v-for="(attribute, index) in social_skills"
                            :key="index"
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
                                    v-if="attribute.pivot.attribute_value < 5 && $page.props.auth.user.role === 'game_master'"
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

                            <p
                                v-if="attribute.pivot.specialties"
                                class="text-skin-50 text-sm lg:text-lg"
                            >
                                {{ attribute.pivot.specialties }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col items-end">
                        <h2 class="column_title mb-1">Mentales</h2>
                        <div
                            v-for="(attribute, index) in mental_skills"
                            :key="index"
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
                                    v-if="attribute.pivot.attribute_value < 5 && $page.props.auth.user.role === 'game_master'"
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

                            <p
                                v-if="attribute.pivot.specialties"
                                class="text-skin-50 text-sm lg:text-lg"
                            >
                                {{ attribute.pivot.specialties }}
                            </p>
                        </div>
                    </div>
                </div>
            </template>
        </Foldable>
    </div>
</template>
