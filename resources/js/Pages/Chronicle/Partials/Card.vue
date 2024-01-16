<script setup>
const props = defineProps({
    chronicle: Object,
});
</script>

<template>
    <div class="mt-4 bg-slate-500 px-4 py-2 rounded-lg">
        <h1 class="attribute_title">{{ props.chronicle.name }}</h1>
        <p class="title text-justify">{{ props.chronicle.details }}</p>
    </div>
</template>
