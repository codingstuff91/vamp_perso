import {defineStore} from "pinia";

export const useCompulsionStore = defineStore('compulsion', {
    state: () => {
        return {
            compulsions: {},
        }
    },
    actions: {
        async getCompulsions(character) {
            const response = await axios.get(`/compulsions/${character}`);
            this.compulsions = response.data;
        },
        async setRandomCompulsion(character) {
            const response = await axios.get(`/compulsions/${character}`);
            this.compulsions = response.data;
            console.log('Associate compulsion to a character')
        },
    }
})
