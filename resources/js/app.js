//
import { createApp } from 'vue';
import Footer from './components/Footer.vue';
import Dashboard from './components/Dashboard.vue';

const footer = document.getElementById('vue-footer');
const dashboard = document.getElementById('dashboard');

if (footer) {
    createApp(Footer).mount('#vue-footer');
}

if(dashboard){

    createApp(Dashboard,{
        stats: JSON.parse(
            dashboard.dataset.stats
        )
    })
    .mount('#dashboard');

}