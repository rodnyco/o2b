import { createApp } from 'vue';
import AuctionListComponent from "./components/AuctionListComponent";

const app = createApp({});
app.component('auction-list', AuctionListComponent).mount('#app');
