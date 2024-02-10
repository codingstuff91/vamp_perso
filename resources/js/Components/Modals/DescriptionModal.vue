<template>
    <div
        class="bg-darkness-900 absolute left-0 top-[64px] w-full h-full overflow-y-auto opacity-100 transition-opacity z-50 border-t border-blood-500"
        v-if="modalStore.open"
    >
        <div class="description-modal">
            <button
                class="fixed right-4 top-[77px] rounded-full border-2 border-blood-500 w-10 h-10"
                @click="modalStore.setModalStatus"
            >
                <i class="text-blood-500 text-2xl fa-solid fa-xmark"></i>
            </button>

            <h1>{{ modalStore.details.name }}</h1>

            <p v-html="modalStore.details.description.text"></p>
        </div>
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

