import './bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
const app = createApp({});
import selectDependiente from './components/selectDependiente.vue';
app.component('select-dependiente', selectDependiente);

app.mount('#app');