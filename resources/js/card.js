/* global Nova */
import Card from './components/Card.vue';

Nova.booting((Vue) => {
    Vue.component('worldclock', Card)
});
