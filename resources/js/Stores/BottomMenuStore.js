import { defineStore } from "pinia";
export const useRightMenuStore = defineStore('right_menu',{
    state: () => {
        return {
            open: false,
            category: "attributes"
        }
    },
    actions: {
        toggle() {
            this.open = !this.open;
        },
        close() {
          this.open = false;
        },
        setPanelMenu(category){
            this.category = category;
            this.open = !this.open;
        }
    }
})
