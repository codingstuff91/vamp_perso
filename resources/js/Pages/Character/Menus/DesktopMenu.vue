<script setup>
import {useRightMenuStore} from "@/Stores/MobileMenuStore.js";

const menuStore = useRightMenuStore();

</script>

<template>
    <div>
        <button
            class="desktop_menu_buttons"
            :class="{desktop_menu_active : menuStore.category == 'attributes'}"
            @click="menuStore.setPanelMenu('attributes')"
        >
            Attributes
        </button>

        <button
            class="desktop_menu_buttons"
            :class="{desktop_menu_active : menuStore.category == 'status'}"
            @click="menuStore.setPanelMenu('status')"
        >
            Statut
        </button>

        <button
            class="desktop_menu_buttons"
            :class="{desktop_menu_active : menuStore.category == 'disciplines'}"
            @click="menuStore.setPanelMenu('disciplines')"
        >
            Disciplines
        </button>

        <button
            class="desktop_menu_buttons"
            :class="{desktop_menu_active : menuStore.category == 'backgrounds'}"
            @click="menuStore.setPanelMenu('backgrounds')"
        >
            Backgrounds
        </button>

        <button
            class="desktop_menu_buttons"
            :class="{desktop_menu_active : menuStore.category == 'concepts'}"
            @click="menuStore.setPanelMenu('concepts')"
        >
            Concepts
        </button>

        <button
            class="desktop_menu_buttons"
            :class="{desktop_menu_active : menuStore.category == 'descriptions'}"
            @click="menuStore.setPanelMenu('descriptions')"
        >
            Descriptions
        </button>
    </div>
</template>
