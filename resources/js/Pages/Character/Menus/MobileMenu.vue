<script setup>
import { useRightMenuStore } from "@/Stores/BottomMenuStore.js";
const menuStore = useRightMenuStore();

</script>

<template>
    <div class="flex justify-center">
        <button class="mobile-menu">
            <img
                src="/img/sections.png"
                class="w-8 h-8"
            >
            <h1 class="ml-2">Rubriques</h1>
        </button>
    </div>
</template>
