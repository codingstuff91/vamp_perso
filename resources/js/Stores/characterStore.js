import { defineStore } from "pinia";
export const useCharacterStore = defineStore('character',{
    state: () => {
        return {
            character: {},
        }
    },
    actions: {
        async setCurrentCharacter(character) {
            this.character = character;
        },
    }
})
