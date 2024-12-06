<script setup>
import {useRightMenuStore} from "@/Stores/MobileMenuStore.js";

const menuStore = useRightMenuStore();

</script>

<template>
    <div>
        <button
            :class="{desktop_menu_active : menuStore.category == 'attributes'}"
            class="desktop_menu_buttons"
            @click="menuStore.setPanelMenu('attributes')"
        >
            Attributes
        </button>

        <button
            :class="{desktop_menu_active : menuStore.category == 'disciplines'}"
            class="desktop_menu_buttons"
            @click="menuStore.setPanelMenu('disciplines')"
        >
            Disciplines
        </button>

        <button
            :class="{desktop_menu_active : menuStore.category == 'backgrounds'}"
            class="desktop_menu_buttons"
            @click="menuStore.setPanelMenu('backgrounds')"
        >
            Backgrounds
        </button>

        <button
            :class="{desktop_menu_active : menuStore.category == 'concepts'}"
            class="desktop_menu_buttons"
            @click="menuStore.setPanelMenu('concepts')"
        >
            Concepts
        </button>

        <button
            :class="{desktop_menu_active : menuStore.category == 'descriptions'}"
            class="desktop_menu_buttons"
            @click="menuStore.setPanelMenu('descriptions')"
        >
            Descriptions
        </button>
    </div>
</template>
