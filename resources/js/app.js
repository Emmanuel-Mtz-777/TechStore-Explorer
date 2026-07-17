//
import { createApp } from 'vue';
import Footer from './components/Footer.vue';

const footer = document.getElementById('vue-footer');

if (footer) {
    createApp(Footer).mount('#vue-footer');
}