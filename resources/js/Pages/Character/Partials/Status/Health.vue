<script setup>
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";
import {computed} from "vue";
import {useModalStore} from "@/Stores/modalStore.js";
import Foldable from "@/Components/Foldable.vue";

const modalStore = useModalStore();

const props = defineProps({
    character: Object,
});

const healthAttributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category === 'health'
    });
});

const maxHealthPoints = healthAttributes.value[2].pivot.attribute_value;

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-2">
        <Foldable>
            <template #header>
                <h1 class="section_title text-center my-2">Santé</h1>
            </template>
            <template #content>
                <div class="flex flex-col justify-center items-center px-2 py-4 w-full">
                    <h2
                        class="attribute_title"
                        @click="showDescription('attribute', healthAttributes[0].id)"
                    >
                        {{ healthAttributes[0].name }}
                    </h2>
                    <DynamicGauge
                        :attribute="healthAttributes[0].pivot.attribute_id"
                        :max="maxHealthPoints"
                        :value="healthAttributes[0].pivot.attribute_value"
                        icon="fa-solid fa-hand-fist"
                    />
                </div>
                <div class="flex flex-col justify-center items-center px-2 pb-4 w-full">
                    <h2
                        class="attribute_title"
                        @click="showDescription('attribute', healthAttributes[1].id)"
                    >
                        {{ healthAttributes[1].name }}
                    </h2>
                    <DynamicGauge
                        :attribute="healthAttributes[1].pivot.attribute_id"
                        :max="maxHealthPoints"
                        :value="healthAttributes[1].pivot.attribute_value"
                        icon="fa-solid fa-skull"
                    />
                </div>
            </template>
        </Foldable>
    </div>
</template>
