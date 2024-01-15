<script setup>
import Power from "@/Pages/Character/Partials/Power.vue";

const props = defineProps({
    character: Object,
    disciplines : Object,
});
</script>

<template>
    <div class="py-2">
        <div class="flex justify-center">
            <h1 class="title text-2xl text-red-500 mt-2 mb-4">Disciplines</h1>
        </div>
        <div v-for="(discipline, index) in disciplines" :key="index">
            <h1 class="my-2 text-2xl text-white pl-6 mb-2">{{ discipline[0].discipline.name }}</h1>
            <Power
                v-for="(power, index) in discipline"
                :key="index"
                :power="discipline[index]"
            />
        </div>
    </div>
</template>
