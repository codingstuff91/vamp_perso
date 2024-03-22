<script setup>
import {useModalStore} from "@/Stores/modalStore.js";
import {useBackgroundStore} from "@/Stores/BackgroundStore.js";

import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const backgroundStore = useBackgroundStore();
const modalStore = useModalStore();

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="py-2">
        <DetailsModal
            :show="modalStore.open"
            :closeable="true"
        />

        <div class="mt-8 grid grid-cols-2 gap-1">
            <div class="flex flex-col items-center">
                <h2 class="section_title text-center">Avantages</h2>

                <div class="mt-4"
                     v-for="(advantage, index) in backgroundStore.advantages"
                     :key="index"
                >
                    <h3
                        class="attribute_title"
                        @click="showDescription('backgroundType', advantage.type.id)"
                    >
                        {{ advantage.type.name }}
                    </h3>
                    <p
                        class="subtitle text-center"
                        @click="showDescription('background', advantage.id)"
                    >
                        {{ advantage.name }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="section_title text-center">Handicaps</h2>

                <div class="mt-4"
                     v-for="(handicap, index) in backgroundStore.handicaps"
                     :key="index"
                >
                    <h3
                        class="attribute_title"
                        @click="showDescription('backgroundType', handicap.type.id)"
                    >
                        {{ handicap.type.name }}
                    </h3>

                    <p
                        class="subtitle text-center"
                        @click="showDescription('background', handicap.id)"
                    >
                        {{ handicap.name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
