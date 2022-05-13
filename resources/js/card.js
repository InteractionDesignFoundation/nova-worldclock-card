/* global Nova */
import Card from './components/Card';

Nova.booting((app, store) => {
    app.component('worldclock-card', Card)
});
