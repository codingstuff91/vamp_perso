<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { reactive } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    user: Object,
});

const form = reactive({
    name: null,
    details: null,
});

function submitForm () {
    router.post('/chronicles', form);
}
</script>

<template>
    <Head title="Création de chronique" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <h2 class="title text-xl text-gray-800 leading-tight">Création de chronique</h2>
                </div>
            </div>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <form
                        class="flex flex-col"
                        @submit.prevent="submitForm"
                    >
                        <input-label
                            value="Nom"
                            class="text-white"
                        />

                        <text-input
                            v-model="form.name"
                        />

                        <input-label
                            value="Détails"
                            class="mt-4 text-white"
                        />
                        <textarea
                            cols="30"
                            rows="10"
                            v-model="form.details"
                        >
                        </textarea>

                        <primary-button
                            class="mt-4"
                            type="submit"
                        >
                            Confirmer
                        </primary-button>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
