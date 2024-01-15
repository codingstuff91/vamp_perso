import { defineStore } from "pinia";
export const useCharacterAttributesStore = defineStore('attributes',{
    state: () => {
        return {
            attributes: {},
        }
    },
    actions: {
        async getAttributes(character) {
            await axios.get(`/character/${character.id}/attributes`).then((response) => {
                this.attributes = response.data;
            });
        },
    },
    getters: {
        willPowerAttributes: (state) => state.attributes.filter(element => {
            return element.category == 'willpower';
        }),
        healthAttributes: (state) => state.attributes.filter(element => {
            return element.category == 'willpower';
        }),
    },
})
