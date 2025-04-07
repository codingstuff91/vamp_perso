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
    },
})
