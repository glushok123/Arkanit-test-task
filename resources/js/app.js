require('./bootstrap');

import { createApp } from 'vue';
import tablePayment from './components/TablePayment.vue';

let app=createApp({})
app.component('table-payment' , tablePayment);

app.mount("#app")