require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import TestComponent from "./components/TestComponent.vue";

window.Alpine = Alpine;

Alpine.start();



const app = createApp({});

app.component("test", TestComponent).mount('#app');
