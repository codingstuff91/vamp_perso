<template>
    <div class="character_card">
        <h2 class="text-lg">{{ character.name }}</h2>
        <form class="mt-6 space-y-6" @submit.prevent="form.put(route('experience.update', character))">
            <InputLabel value="Points experience"/>

            <TextInput
                v-model="form.experiencePoints"
                autofocus
                class="mt-1 block w-full"
                required
                type="text"
            />

            <PrimaryButton :disabled="form.processing">Confirmer</PrimaryButton>
        </form>
    </div>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    character: Object,
});

const form = useForm({
    characterId: props.character.id,
    experiencePoints: 0,
});

</script>
