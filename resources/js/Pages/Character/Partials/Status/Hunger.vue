<script setup>
import {ref} from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";
import {useCharacterStore} from "@/Stores/characterStore.js";

const attributesStore = useCharacterAttributesStore();
const characterStore = useCharacterStore();

const maxHungerLevel = ref(5)
const bloodPotency = characterStore.character.blood_potency;
</script>

<template>
    <div class="mt-8 px-4 grid grid-cols-1 gap-4 w-full lg:grid-cols-2 lg:gap-8">
        <div class="mx-auto">
            <h2
                class="section_title text-center"
                @click="$emit('getDescription', 'attribute', attributesStore.hungerAttributes[0].id)"
            >
                Soif / Sang
            </h2>
            <div class="mt-2 flex flex-col items-center">
                <DynamicGauge
                    :attribute="attributesStore.hungerAttributes[0].pivot.attribute_id"
                    :value="attributesStore.hungerAttributes[0].pivot.attribute_value"
                    icon="fa-solid fa-droplet"
                    color="text-blood-500"
                    :max="maxHungerLevel"
                />
            </div>
            <div class="text-center">
                <h3 class="text-blood-500 font-bold italic text-2xl mt-8 lg:text-3xl">Prédation :
                    {{ characterStore.character.predation.name }}</h3>
                <p class="subtitle text-justify" v-html="characterStore.character.predation.description"></p>
            </div>
        </div>

        <div class="mx-auto">
            <p class="section_title text-center">Puissance sang : <span class="text-skin-50">{{
                    bloodPotency.level
                }}</span></p>
            <div class="mt-8 grid grid-cols-2 gap-2 w-full flex justify-center lg:grid-cols-3">
                <div>
                    <h2 class="attribute_title">Coup de sang</h2>
                    <p class="subtitle">{{ bloodPotency.blood_rise }}</p>
                </div>
                <div>
                    <h2 class="attribute_title">Bonus aux pouvoirs</h2>
                    <p class="subtitle">{{ bloodPotency.power_bonus }}</p>
                </div>
                <div>
                    <h2 class="attribute_title">Pénalité nourrir</h2>
                    <p class="subtitle">{{ bloodPotency.feeding_penalty }}</p>
                </div>
                <div>
                    <h2 class="attribute_title">Soins par tour</h2>
                    <p class="subtitle">{{ bloodPotency.damage_healed_per_turn }}</p>
                </div>
                <div>
                    <h2 class="attribute_title">Test de soif</h2>
                    <p class="subtitle">{{ bloodPotency.hunger_test }}</p>
                </div>
                <div>
                    <h2 class="attribute_title">Score de fléau</h2>
                    <p class="subtitle">{{ bloodPotency.bane_score }}</p>
                </div>
            </div>
        </div>
    </div>
</template>
