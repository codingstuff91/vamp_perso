<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";

const props = defineProps({
    character: Object,
    attribute: Object,
    attribute_value: Number,
    required_experience_points: Number,
});

const improveCharacter = () => {
    if (confirm('Êtes-vous sûr de vouloir améliorer cet attribut ?')) {
        axios.put(`/character/${props.character.id}/attribute/${props.attribute.id}/improve`, {
            newScore: props.attribute_value + 1,
            consumedExperiencePoints: props.required_experience_points,
        }).then(() => {
            window.location.href = `/characters/${props.character.id}`;
        });
    }
}

</script>

<template>
    <Head title="Attribute Improvement"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-center">
                <div class="flex flex-col">
                    <h1 class="attribute_title text-2xl leading-tight text-center">Amélioration Attribut /
                        Compétence</h1>
                </div>
            </div>
        </template>

        <div class="pb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="my-4 text-center section_title">{{ attribute.name }}</h1>
                <div class="flex flex-col items-center gap-x-4 gap-y-4">
                    <AttributeGauge
                        :max="5"
                        :value="attribute_value"
                    />

                    <h2 class="mt-4 text-center attribute_title">Cout amélioration</h2>
                    <p class="column_title">{{ required_experience_points }} points d'expérience</p>

                    <button
                        class="p-2 mt-4 rounded-lg w-1/2 bg-blood-500 text-chalk-50 text-lg font-bold"
                        @click="improveCharacter"
                    >
                        Valider
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
