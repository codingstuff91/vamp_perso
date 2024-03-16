<script setup>

const props = defineProps({
    level: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="bg-blood-500 rounded-xl px-4 py-1 w-auto">
        <h2 class="text-lg font-bold text-chalk-50 text-center">Niv.{{ level }}</h2>
    </div>
</template>
