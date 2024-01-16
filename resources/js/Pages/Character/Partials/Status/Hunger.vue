<script setup>
import { ref } from "vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

import { useCharacterAttributesStore } from "@/Stores/characterAttributesStore";
const attributesStore = useCharacterAttributesStore();

const maxHungerLevel = ref(5)
</script>

<template>
    <div class="mt-4 border-b border-gray-500">
        <h2 class="attribute_category_title text-2xl text-center">Soif / Sang</h2>
        <div class="flex flex-col justify-center items-center px-2 w-full">
            <div class="flex flex-col items-center">
                <DynamicGauge
                    :value="attributesStore.hungerAttributes[0].pivot.attribute_value"
                    icon="fa-solid fa-droplet text-2xl"
                    color="text-red-500"
                    :max="maxHungerLevel"
                />
            </div>
            <div class="flex flex-col items-center">
                <p class="attribute_title">Puissance sang 1</p>
                <div class="mt-4 mb-4 grid grid-cols-2 gap-2 w-full flex justify-center">
                    <div>
                        <h2 class="title text-xl">Coup de sang</h2>
                        <p class="attribute_title">Valeur</p>
                    </div>
                    <div>
                        <h2 class="title text-xl">Bonus aux pouvoirs</h2>
                        <p class="attribute_title">Valeur</p>
                    </div>
                    <div>
                        <h2 class="title text-xl">Pénalité nourrir</h2>
                        <p class="attribute_title">Valeur</p>
                    </div>
                    <div>
                        <h2 class="title text-xl">Soins par tour</h2>
                        <p class="attribute_title">Valeur</p>
                    </div>
                    <div>
                        <h2 class="title text-xl">Test de soif</h2>
                        <p class="attribute_title">Valeur</p>
                    </div>
                    <div>
                        <h2 class="title text-xl">Score de fléau</h2>
                        <p class="attribute_title">Valeur</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
