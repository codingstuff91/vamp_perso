<script setup>
import { router } from '@inertiajs/vue3'
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    chronicle: Object,
    user: Object
});

const selectChronicle = async (chronicle) => {
    await axios.post(`/chronicles/${props.user.id}/select`, { 'chronicle_id' : props.chronicle.id})
        .then(router.get('/characters'));
}
</script>

<template>
    <div class="mt-4 bg-slate-700 px-4 py-2 rounded-lg">
        <h1 class="attribute_category_title">{{ props.chronicle.name }}</h1>
        <p class="mt-4 subtitle text-justify">{{ props.chronicle.details }}</p>
        <primary-button
            class="mt-4 w-full"
            @click="selectChronicle(props.chronicle.id)"
        >
            Choisir
        </primary-button>
    </div>
</template>
