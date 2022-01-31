import { createApp } from 'vue';
import CreateAuctionFormComponent from "./components/CreateAuctionFormComponent.vue";

const app = createApp({});
app.component("auction-create-form", CreateAuctionFormComponent).mount('#app');
