<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {onMounted, onUpdated} from "vue";
import {Head} from '@inertiajs/vue3';

import Attributes from "@/Pages/Character/Partials/Attributes.vue";
import Skills from "@/Pages/Character/Partials/Skills.vue";
import Status from "@/Pages/Character/Partials/Status.vue";
import Compulsions from "@/Pages/Character/Partials/Compulsions.vue";

import {useCharacterStore} from "@/Stores/characterStore.js";
import {useRightMenuStore} from "@/Stores/MobileMenuStore.js";
import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";
import {useCharacterConceptsStore} from "@/Stores/characterConceptsStore";
import {useCompulsionStore} from "@/Stores/CompulsionStore.js";

import Disciplines from "@/Pages/Character/Partials/Disciplines.vue";
import Concepts from "@/Pages/Character/Partials/Concepts.vue";
import Descriptions from "@/Pages/Character/Partials/Descriptions.vue";
import DesktopMenu from "@/Pages/Character/Menus/DesktopMenu.vue";
import MobileMenu from "@/Pages/Character/Menus/MobileMenu.vue";

const rightMenustore = useRightMenuStore();
const characterStore = useCharacterStore();
const attributesStore = useCharacterAttributesStore();
const conceptsStore = useCharacterConceptsStore();
const compulsionStore = useCompulsionStore();

const props = defineProps({
    character: Object,
    disciplines: Object,
});

onMounted(async () => {
    await characterStore.setCurrentCharacter(props.character)
    await attributesStore.getAttributes(props.character)
    await conceptsStore.getConcepts(props.character)
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
            <MobileMenu/>

            <div
                class="w-full p-4 flex justify-between lg:w-2/3 lg:hidden"
                v-if="rightMenustore.category == 'attributes'"
            >
                <div>
                    <h2 class="header_attribute_title">Fléau de clan</h2>
                    <h2 class="subtitle">{{ character.clan.bane }}</h2>
                </div>
                <div>
                    <Compulsions/>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <CompulsionModal/>
                <DesktopMenu class="desktop_menu"/>

                <div
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'attributes'"
                >
                    <Attributes :character="character"/>

                    <Skills :character="character"/>
                </div>

                <div
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'status'"
                >
                    <Status/>
                </div>

                <div
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'disciplines'"
                >
                    <Disciplines
                        :character="character"
                        :disciplines="disciplines"
                    />
                </div>

                <div
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'concepts'"
                >
                    <Concepts/>
                </div>

                <div
                    class="bg-darkness-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'descriptions'"
                >
                    <Descriptions :character="character"/>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
