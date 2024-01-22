<template>
    <div
        class="bg-darkness-900 absolute left-0 top-[170px] w-full h-full overflow-y-auto opacity-100 transition-opacity z-50	"
        v-if="modalStore.open"
    >
        <button
            class="fixed right-2 top-[180px] rounded-full w-10 h-10"
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
import { onMounted, onUnmounted } from "vue";
const modalStore = useModalStore();

const props = defineProps({
    attribute: Number,
});

onMounted(() => {
    window.scrollTo({
        top: 0,
        // behavior: 'smooth'
    });

    document.body.style.overflow = 'hidden';
})

onUnmounted(() => {
    document.body.style.overflow = 'visible';
})
</script>

