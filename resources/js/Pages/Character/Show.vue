<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { onMounted } from "vue";
import { Head } from '@inertiajs/vue3';

import Attributes from "@/Pages/Character/Partials/Attributes.vue";
import Skills from "@/Pages/Character/Partials/Skills.vue";
import Status from "@/Pages/Character/Partials/Status.vue";
import BottomRightMenu from "@/Pages/Character/Menus/BottomRightMenu.vue";

import { useCharacterStore } from "@/Stores/characterStore.js";
import { useRightMenuStore } from "@/Stores/BottomMenuStore.js";
import { useCharacterAttributesStore } from "@/Stores/characterAttributesStore";

import Disciplines from "@/Pages/Character/Partials/Disciplines.vue";
import Concepts from "@/Pages/Character/Partials/Concepts.vue";
import Descriptions from "@/Pages/Character/Partials/Descriptions.vue";

const rightMenustore = useRightMenuStore();
const characterStore = useCharacterStore();
const attributesStore = useCharacterAttributesStore();

const props = defineProps({
    character: Object,
    disciplines: Object,
});

onMounted(async () => {
    await characterStore.setCurrentCharacter(props.character)
    await attributesStore.getAttributes(props.character)
})
</script>

<template>
    <Head :title="character.name" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h2 class="attribute_title text-2xl leading-tight">{{ character.name }}</h2>
                    <p class="subtitle">{{ character.clan.name }}</p>
                </div>
                <div class="flex flex-col">
                    <h2 class="attribute_title text-2xl">{{ character.experience_points }} / {{ character.experience_total }} xp</h2>
                    <p class="subtitle">{{ character.generation }}ème génération</p>
                </div>
            </div>
        </template>

        <div>
            <div
                class="w-full border-b border-red-500 p-4 flex justify-between"
                v-if="rightMenustore.category == 'attributes'"
            >
                <div>
                    <h2 class="header_attribute_title">Fléau de clan</h2>
                    <h2 class="subtitle">{{ character.clan.bane }}</h2>
                </div>
                <div>
                    <h2 class="header_attribute_title">Compulsion</h2>
                    <h2 class="subtitle">{{ character.compulsion ? character.compulsion.name : 'Aucune'}}</h2>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'attributes'"
                >
                    <Attributes :character="character" />

                    <Skills :character="character"/>
                </div>

                <div
                    class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'status'"
                >
                    <Status />
                </div>

                <div
                    class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'disciplines'"
                >
                    <Disciplines
                        :character="character"
                        :disciplines="disciplines"
                    />
                </div>

                <div
                    class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'concepts'"
                >
                    <Concepts :character="character" />
                </div>

                <div
                    class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg"
                    v-if="rightMenustore.category == 'descriptions'"
                >
                    <Descriptions :character="character" />
                </div>

                <BottomRightMenu />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
