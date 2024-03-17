<script setup>
import {useRightMenuStore} from "@/Stores/MobileMenuStore.js";

const menuStore = useRightMenuStore();

const toggleMenu = async () => {
    await menuStore.toggle();
}
</script>

<template>
    <div class="flex justify-center lg:hidden">
        <button
            class="mobile-menu"
            @click="toggleMenu"
        >
            <img
                src="/img/sections.png"
                class="w-8 h-8"
            >
            <h1 class="ml-2">Rubriques</h1>
        </button>
    </div>

    <!-- Foldable menu-->
    <div
        v-if="menuStore.open"
        class="bottom_right_menu fixed top-[240px] h-auto w-full border border-red-500 flex flex-col items-center"
    >
        <button
            class="menu_text"
            @click="menuStore.setPanelMenu('attributes')"
        >
            Attributs & Compétences
        </button>
        <button
            class="menu_text"
            @click="menuStore.setPanelMenu('status')"
        >
            Statut
        </button>
        <button
            class="menu_text"
            @click="menuStore.setPanelMenu('disciplines')"
        >
            Disciplines
        </button>
        <button
            class="menu_text"
            @click="menuStore.setPanelMenu('backgrounds')"
        >
            Avantages & Handicaps
        </button>
        <button
            class="menu_text"
            @click="menuStore.setPanelMenu('concepts')"
        >
            Concepts
        </button>

        <button
            class="menu_text"
            @click="menuStore.setPanelMenu('descriptions')"
        >
            Descriptions
        </button>
    </div>
</template>
