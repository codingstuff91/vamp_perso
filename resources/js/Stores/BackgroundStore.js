import {defineStore} from "pinia";

export const useBackgroundStore = defineStore('backgrounds', {
    state: () => {
        return {
            backgrounds: {},
        }
    },
    actions: {
        async getBackgrounds(character) {
            const response = await axios.get(`/character/${character.id}/backgrounds`)
            this.backgrounds = response.data;
        },
    }
})
