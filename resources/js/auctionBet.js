import { createApp } from 'vue';
import AuctionBetComponent from "./components/AuctionBetComponent.vue";

const app = createApp({});
app.component('new-bet-form', AuctionBetComponent).mount('#app');
