<script setup>
import Willpower from "@/Pages/Character/Partials/Status/Willpower.vue";
import Health from "@/Pages/Character/Partials/Status/Health.vue";
import Humanity from "@/Pages/Character/Partials/Status/Humanity.vue";
import Hunger from "@/Pages/Character/Partials/Status/Hunger.vue";

import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

const modalStore = useModalStore();

const showDescription = async (entity, id) => {
    await modalStore.getDescription(entity, id);
    await modalStore.toggle();
}
</script>

<template>
    <div class="pt-2 pb-8">
        <DetailsModal
            :closeable="true"
            :show="modalStore.open"
        />

        <Hunger @get-description="showDescription"/>

        <div class="mt-8 pt-4 grid grid-cols-1 gap-2 lg:grid-cols-2 lg:border-t lg:border-gray-700">
            <Willpower @get-description="showDescription"/>

            <Health @get-description="showDescription"/>
        </div>

        <div class="mt-8">
            <Humanity @get-description="showDescription"/>
        </div>
    </div>
</template>
