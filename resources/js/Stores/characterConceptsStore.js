import { defineStore } from "pinia";
export const useCharacterConceptsStore = defineStore('concepts',{
    state: () => {
        return {
            concepts: [],
        }
    },
    actions: {
        async getConcepts(character) {
            const response = await axios.get(`/character/${character.id}/concepts`)
            this.concepts = response.data;
        },
    },
})
