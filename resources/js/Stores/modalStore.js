import {defineStore} from "pinia";

export const useModalStore = defineStore('modal', {
    state: () => {
        return {
            open: false,
            details: '',
        }
    },
    actions: {
        toggle() {
            this.open = !this.open;
        },
        close() {
            this.open = false;
        },
        async getDescription(entity, id) {
            const response = await axios.post('/descriptions/show', {
                entity,
                id,
            });

            this.details = response.data;
        },
    }
})
