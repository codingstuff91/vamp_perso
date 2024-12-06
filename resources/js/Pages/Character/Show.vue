<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {onMounted} from "vue";
import {Head} from '@inertiajs/vue3';

import Attributes from "@/Pages/Character/Partials/Attributes.vue";
import Skills from "@/Pages/Character/Partials/Skills.vue";
import Status from "@/Pages/Character/Partials/Status.vue";
import Compulsions from "@/Pages/Character/Partials/Compulsions.vue";
import Backgrounds from "@/Pages/Character/Partials/Backgrounds.vue";

import {useCharacterStore} from "@/Stores/characterStore.js";
import {useRightMenuStore} from "@/Stores/MobileMenuStore.js";
import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";
import {useCharacterConceptsStore} from "@/Stores/characterConceptsStore";
import {useCompulsionStore} from "@/Stores/CompulsionStore.js";
import {useBackgroundStore} from "@/Stores/BackgroundStore.js";

import Disciplines from "@/Pages/Character/Partials/Disciplines.vue";
import Concepts from "@/Pages/Character/Partials/Concepts.vue";
import Descriptions from "@/Pages/Character/Partials/Descriptions.vue";
import DesktopMenu from "@/Pages/Character/Menus/DesktopMenu.vue";
// import NewMobileMenu from "@/Pages/Character/Menus/MobileMenu.vue";
import NewMobileMenu from "@/Pages/Character/Menus/NewMobileMenu.vue";
import Hunger from "@/Pages/Character/Partials/Status/Hunger.vue";
import Willpower from "@/Pages/Character/Partials/Status/Willpower.vue";

const rightMenustore = useRightMenuStore();
const characterStore = useCharacterStore();
const attributesStore = useCharacterAttributesStore();
const conceptsStore = useCharacterConceptsStore();
const compulsionStore = useCompulsionStore();
const backgroundStore = useBackgroundStore();

const props = defineProps({
    character: Object,
    disciplines: Object,
});

onMounted(async () => {
    await characterStore.setCurrentCharacter(props.character)
    await attributesStore.getAttributes(props.character)
    await conceptsStore.getConcepts(props.character)
    await backgroundStore.getBackgrounds(props.character)
});
</script>

<template>
    <Head :title="character.name"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between mx-auto lg:max-w-6xl">
                <div class="flex flex-col items-start">
                    <h2 class="attribute_title leading-tight">{{ character.name }}</h2>
                    <p class="subtitle">{{ character.clan.name }}</p>
                </div>
                <div class="hidden flex flex-col items-start lg:block">
                    <h2 class="attribute_title">Fléau de clan</h2>
                    <p class="subtitle">{{ character.clan.bane }}</p>
                </div>

                <div class="hidden lg:block">
                    <Compulsions/>
                </div>

                <div class="flex flex-col items-end">
                    <h2 class="attribute_title">{{ character.experience_points }} /
                        {{ character.experience_total }} xp</h2>
                    <p class="subtitle">{{ character.generation }}ème génération</p>
                </div>
            </div>
        </template>

        <div class="w-full">
            <div class="relative">
                <NewMobileMenu/>
            </div>

            <div
                v-if="rightMenustore.category == 'attributes'"
                class="w-full px-4 pt-2 flex justify-between border-b border-gray-700 lg:w-2/3 lg:hidden"
            >
                <div>
                    <h2 class="header_attribute_title mb-2">Fléau de clan</h2>
                    <h2 class="subtitle">{{ character.clan.bane }}</h2>
                </div>
                <div>
                    <Compulsions/>
                </div>
            </div>
            <div class="px-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <DesktopMenu class="desktop_menu"/>

                <div
                    v-if="rightMenustore.category == 'attributes'"
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <Attributes :character="character"/>

                    <Skills :character="character"/>

                    <Hunger :character="character"/>

                    <Willpower :character="character"/>
                </div>

                <div
                    v-if="rightMenustore.category == 'status'"
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <Status/>
                </div>

                <div
                    v-if="rightMenustore.category == 'disciplines'"
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <Disciplines
                        :character="character"
                        :disciplines="disciplines"
                    />
                </div>

                <div
                    v-if="rightMenustore.category == 'backgrounds'"
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <Backgrounds/>
                </div>

                <div
                    v-if="rightMenustore.category == 'concepts'"
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <Concepts/>
                </div>

                <div
                    v-if="rightMenustore.category == 'descriptions'"
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                >
                    <Descriptions :character="character"/>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
