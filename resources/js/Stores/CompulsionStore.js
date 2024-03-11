import {defineStore} from "pinia";

export const useCompulsionStore = defineStore('compulsion', {
    state: () => {
        return {
            compulsion: {},
        }
    },
    actions: {
        async getCompulsions(character) {
            const response = await axios.get(`/compulsions/${character}`);
        },
        async setRandomCompulsion(character) {
            const response = await axios.get(`/compulsions/${character}`);
            this.compulsion = response.data;
        },
    }
})
