import {defineStore} from "pinia";

export const useDisciplineStore = defineStore('disciplines', {
    state: () => {
        return {
            powers: {},
        }
    },
    actions: {
        async getPowers(discipline) {
            const response = await axios.get(`/discipline/${discipline.id}/powers`)
            this.powers = response.data;
        },
        async associatePower(character, power, requiredExperiencePoints) {
            await axios.post(`/character/${character.id}/power/${power.id}`, {requiredExperiencePoints})
        }
    },
})
