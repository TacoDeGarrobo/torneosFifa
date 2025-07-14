import './bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import selectDependiente from './components/selectDependiente.vue';
const app = createApp({});
app.component('select-dependiente', selectDependiente);

const vueRoot = document.getElementById('vue-app');
if (vueRoot) {
    app.mount(vueRoot);
}