<script setup>
import {computed, onMounted, ref} from "vue";

import {useCharacterAttributesStore} from "@/Stores/characterAttributesStore";
import {useCharacterStore} from "@/Stores/characterStore.js";
import Foldable from "@/Components/Foldable.vue";
import DynamicGauge from "@/Components/Gauges/DynamicGauge.vue";

const attributesStore = useCharacterAttributesStore();
const characterStore = useCharacterStore();

const props = defineProps({
    character: Object,
});

const bloodPotency = props.character.blood_potency;

const maxHungerLevel = ref(5)

const hunger_attributes = computed(() => {
    return props.character.attributes.filter(attribute => {
        return attribute.category === 'hunger'
    });
});

onMounted(() => {


    // console.log(props.character);
})
</script>

<template>

    <div class="py-2 grid grid-cols-1 gap-4 w-full lg:grid-cols-2 lg:flex lg:justify-center lg:gap-8">
        <Foldable>
            <template #header>
                <h2
                    class="section_title text-center"
                >
                    Soif / Sang
                </h2>
            </template>

            <template #content>
                <div>
                    <div class="mt-2 flex flex-col items-center">
                        <DynamicGauge
                            :attribute="hunger_attributes[0].pivot.attribute_id"
                            :max="maxHungerLevel"
                            :value="hunger_attributes[0].pivot.attribute_value"
                            color="text-blood-500"
                            icon="fa-solid fa-droplet"
                        />
                    </div>
                    <div class="text-center">
                        <h3 class="text-blood-500 font-bold italic text-2xl mt-8 lg:text-3xl">Prédation :
                            {{ props.character.predation.name }}</h3>
                        <p class="subtitle text-justify" v-html="props.character.predation.description"></p>
                    </div>
                </div>

                <div>
                    <p class="section_title text-center">Puissance sang :
                        <span class="text-skin-50">
                            {{ bloodPotency.level }}
                        </span>
                    </p>
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
            </template>
        </Foldable>
    </div>
</template>
