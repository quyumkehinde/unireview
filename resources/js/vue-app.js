import Vue from 'vue'
import VueRouter from 'vue-router';
import { routes } from './routes';
import App from './components/layouts/App'

Vue.use(VueRouter);

const router = new VueRouter({

  mode: 'history',
  routes
});

const app = new Vue({
  el: '#app',
  components: { App },
  router,
});