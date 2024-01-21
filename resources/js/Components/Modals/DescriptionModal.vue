<template>
    <div
        class="bg-darkness-900 absolute left-0 top-[170px] w-full h-full overflow-y-scroll"
        v-if="modalStore.open"
    >
        <button
            class="absolute right-2 top-2 border-2 border-red-500 rounded-full w-10 h-10"
            @click="modalStore.setModalStatus"
        >
            <i class="text-blood-500 text-2xl fa-solid fa-xmark"></i>
        </button>

        <h1 class="attribute_category_title pt-8 text-blood-500 text-center">{{ modalStore.details.name }}</h1>
        <p class="subtitle text-justify px-4">{{ modalStore.details.description.text }}</p>
    </div>
</template>

<script setup>
import { useModalStore } from "@/Stores/modalStore.js";
import { onMounted } from "vue";
const modalStore = useModalStore();

const props = defineProps({
    attribute: Number,
});

onMounted(() => {
    window.scrollTo({
        top: 0,
        // behavior: 'smooth'
    });
})
</script>

