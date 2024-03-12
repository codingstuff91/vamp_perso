<script setup>
import Willpower from "@/Pages/Character/Partials/Status/Willpower.vue";
import Health from "@/Pages/Character/Partials/Status/Health.vue";
import Humanity from "@/Pages/Character/Partials/Status/Humanity.vue";
import Hunger from "@/Pages/Character/Partials/Status/Hunger.vue";
import DescriptionModal from "@/Components/Modals/DescriptionModal.vue";

import {useModalStore} from "@/Stores/modalStore.js";
import DetailsModal from "@/Components/Modals/DetailsModal.vue";

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

        <Hunger @get-description="showDescription"/>

        <div class="mt-8 pt-4 grid grid-cols-1 gap-2 lg:grid-cols-3 lg:border-t lg:border-gray-700">
            <Willpower @get-description="showDescription"/>

            <Health @get-description="showDescription"/>

            <Humanity @get-description="showDescription"/>
        </div>
    </div>
</template>
