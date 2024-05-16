<script setup>
import {ref} from 'vue';

const isOpen = ref(false);

const toggle = () => {
    isOpen.value = !isOpen.value;
}
</script>

<template>
    <div class="foldable">
        <div class="flex justify-center items-center gap-x-4" @click="toggle">
            <slot name="header"></slot>
            <button class="bg-blood-500 h-8 px-2 py-0 rounded-lg text-white">{{
                    isOpen ? 'Réduire' : 'Agrandir'
                }}
            </button>
        </div>
        <transition name="fade">
            <div v-show="isOpen" class="foldable-content">
                <slot name="content"></slot>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from, .fade-leave-to {
    opacity: 0;
}
</style>
