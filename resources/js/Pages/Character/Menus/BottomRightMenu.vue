<script setup>
import { useRightMenuStore } from "@/Stores/BottomMenuStore.js";
const store = useRightMenuStore();

const toggleMenu = () => {
    store.toggle();
}

const setPanelMenu = (category) => {
    store.setPanelMenu(category);
    store.close();
}
</script>

<template>
        <!-- action button-->
    <div class="fixed bottom-2 right-2 rounded-full bg-gray-900 w-12 h-12 flex justify-center items-center border border-gray-100">
        <i class="fa-solid fa-bars text-red-500 text-xl" @click="toggleMenu"></i>
    </div>

    <!-- Foldable menu-->
    <div
        v-if="store.open"
        class="bottom_right_menu fixed h-auto w-[70%] bottom-14 right-0 border border-red-500 flex flex-col items-center"
    >
        <button
            class="menu_text"
            @click="setPanelMenu('attributes')"
        >
            Attributs & Compétences
        </button>
        <button
            class="menu_text"
            @click="setPanelMenu('status')"
        >
            Statut
        </button>
        <button
            class="menu_text"
            @click="setPanelMenu('disciplines')"
        >
            Disciplines
        </button>
        <button
            class="menu_text"
            @click="setPanelMenu('concepts')"
        >
            Concepts
        </button>

        <button
            class="menu_text"
            @click="setPanelMenu('descriptions')"
        >
            Descriptions
        </button>
    </div>
</template>
