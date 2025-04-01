<script setup>
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";
import {computed} from "vue";
import Foldable from "@/Components/Foldable.vue";
import {useModalStore} from "@/Stores/modalStore.js";

const modalStore = useModalStore();

const props = defineProps({
    character: Object,
});

const willPowerAttributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category === 'willpower'
    });
});

const maxWillpowerPoints = willPowerAttributes.value[2].pivot.attribute_value;

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-4">
        <Foldable>
            <template #header>
                <h2
                    class="section_title text-center"
                >
                    Volonté
                </h2>
            </template>

            <template #content>
                <div>
                    <div class="flex flex-col justify-center items-center px-2 py-4 w-full">
                        <h2
                            class="attribute_title"
                            @click="showDescription('attribute', willPowerAttributes[0].pivot.attribute_id)"
                        >
                            {{ willPowerAttributes[0].name }}
                        </h2>
                        <DynamicGauge
                            :attribute="willPowerAttributes[0].pivot.attribute_id"
                            :max="maxWillpowerPoints"
                            :value="willPowerAttributes[0].pivot.attribute_value"
                            icon="fa-solid fa-shield"
                        />
                    </div>
                    <div class="flex flex-col justify-center items-center px-2 pb-4 w-full">
                        <h2
                            class="attribute_title"
                            @click="showDescription('attribute', willPowerAttributes[1].pivot.attribute_id)"
                        >
                            {{ willPowerAttributes[1].name }}
                        </h2>
                        <DynamicGauge
                            :attribute="willPowerAttributes[1].pivot.attribute_id"
                            :max="maxWillpowerPoints"
                            :value="willPowerAttributes[1].pivot.attribute_value"
                            icon="fa-solid fa-skull"
                        />
                    </div>
                </div>
            </template>
        </Foldable>
    </div>
</template>
