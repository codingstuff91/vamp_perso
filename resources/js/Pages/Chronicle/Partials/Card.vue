<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    chronicle: Object,
    user: Object
});

const selectChronicle = async (chronicle) => {
    await axios.post(`/chronicles/${props.user.id}/select`, { 'chronicle_id' : props.chronicle.id}).then(response => console.log(response.data));
}
</script>

<template>
    <div class="mt-4 bg-slate-700 px-4 py-2 rounded-lg">
        <h1 class="attribute_title">{{ props.chronicle.name }}</h1>
        <p class="title text-justify">{{ props.chronicle.details }}</p>
        <primary-button
            class="mt-2 w-full"
            @click="selectChronicle(props.chronicle.id)"
        >
            Choisir
        </primary-button>
    </div>
</template>
