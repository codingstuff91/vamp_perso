<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import AttributeGauge from "@/Components/Gauges/AttributeGauge.vue";
import Swal from "sweetalert2";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    character: Object,
    attribute: Object,
    attribute_value: Number,
    required_experience_points: Number,
});

const improveCharacter = () => {
    Swal.fire({
        title: 'Êtes-vous sûr de vouloir améliorer cet attribut ?',
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Oui, je suis sûr",
        cancelButtonText: "Non, je renonce"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.put(`/character/${props.character.id}/attribute/${props.attribute.id}/improve`, {
                newScore: props.attribute_value + 1,
                consumedExperiencePoints: props.required_experience_points,
            }).then(() => {
                window.location.href = `/characters/${props.character.id}`;
            })
                .catch((exception) => {
                    Swal.fire({
                        title: "Erreur",
                        text: exception.response.data.message,
                        icon: "error"
                    });
                });
        }
    });
}

</script>

<template>
    <Head title="Amélioration personnage"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-center">
                <div class="flex flex-col items-center gap-y-2">
                    <h1 class="attribute_title text-2xl leading-tight text-center">
                        Amélioration Attribut / Compétence
                    </h1>
                    <h2 class="text-skin-50 text-2xl font-bold">
                        Points XP restants : <span class="subtitle">{{ props.character.experience_points }}</span>
                    </h2>
                </div>
            </div>
        </template>

        <div class="pb-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <primary-button
                    class="my-4"
                    @click="$inertia.get(`/characters/${props.character.id}`)"
                >
                    Revenir au personnage
                </primary-button>
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
