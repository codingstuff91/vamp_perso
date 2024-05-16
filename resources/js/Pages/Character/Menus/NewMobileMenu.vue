<script setup>
import {useRightMenuStore} from "@/Stores/MobileMenuStore.js";

const menuStore = useRightMenuStore();

</script>

<template>
    <div class="fixed bottom-0 w-full flex px-2 h-16 justify-between items-center bg-blood-500 lg:hidden">
        <button
            class="h-full w-16 flex flex-col items-center justify-center"
            @click="menuStore.setPanelMenu('attributes')"
        >
            <img
                class="w-8 h-8"
                src="/img/bars.png"
            >
        </button>
        <button
            class="h-full w-16 flex flex-col items-center justify-center"
            @click="menuStore.setPanelMenu('status')"
        >
            <img
                class="w-8 h-8"
                src="/img/sections.png"
            >
        </button>
        <button
            class="h-full w-16 flex flex-col items-center justify-center"
            @click="menuStore.setPanelMenu('disciplines')"
        >
            <img
                class="w-8 h-8"
                src="/img/sections.png"
            >
        </button>
        <button
            class="h-full w-16 flex flex-col items-center justify-center"
            @click="menuStore.setPanelMenu('disciplines')"
        >
            <img
                class="w-8 h-8"
                src="/img/sections.png"
            >
        </button>
        <button
            class="h-full w-16 flex flex-col items-center justify-center"
            @click="menuStore.setPanelMenu('disciplines')"
        >
            <img
                class="w-8 h-8"
                src="/img/sections.png"
            >
        </button>
    </div>
</template>
