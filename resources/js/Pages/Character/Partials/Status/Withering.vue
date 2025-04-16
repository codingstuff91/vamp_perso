<script setup>
import {computed} from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import DetailsModal from "@/Components/Modals/DetailsModal.vue";
import {useModalStore} from "@/Stores/modalStore.js";

const modalStore = useModalStore();

const props = defineProps({
    witheringLevel: Number,
    humanityScore: Number,
});

const maxWitheringLevel = computed(() => {
    return 10 - props.humanityScore
});
const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <DetailsModal
        :closeable="true"
        :show="modalStore.open"
    />
    
    <div class="mt-4 pb-10">
        <h2
            class="section_title text-center"
            @click="showDescription('attribute', 45)"
        >
            Flétrissures
        </h2>
        <div class="flex justify-center px-2 py-4 w-full">
            <div class="flex flex-col items-center">
                <DynamicGauge
                    :max="maxWitheringLevel"
                    :value="witheringLevel"
                    attribute="45"
                    icon="fa-solid fa-notes-medical"
                />
            </div>
        </div>
    </div>
</template>
