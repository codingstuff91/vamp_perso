import { defineStore } from "pinia";
export const useModalStore = defineStore('modal',{
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
            const response = await axios.post('http://127.0.0.1:8000/descriptions/show', {
                entity,
                id,
            });

            this.details = response.data;
        },
        setModalStatus(){
            this.open = !this.open;
        }
    }
})
