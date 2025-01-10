
import { createApp } from "vue";
// import { createRouter, createWebHistory,useRoute } from "vue-router";
import router from "./router/index";
import axios from 'axios';
// layout
import Layout from "./components/layouts/default.vue";

// Define a global mixin to access subdomain
const subdomainMixin = {
    data() {
      return {
       subdomain:localStorage.getItem('subdomain'),
       access_token:localStorage.getItem('access_token')
        
      };
    },
    computed: {
        baseUrl() {
          return "http://"+this.subdomain+".localhost:8000/api/"; 
        }
      }
  };
  const axiosInstance = 
  axios.create({ baseURL: `http://${subdomainMixin.subdomain}.localhost:8000/api/`, headers: { Authorization: `Bearer ${localStorage.getItem('access_token')}`, 'Content-Type': 'application/json' } });
  // Register the mixin globally
// Create the Vue app instance 
const app = createApp(Layout); 
// Register the mixin globally 
app.mixin(subdomainMixin);
app.config.globalProperties.$axios = axiosInstance;
// Use the router 
app.use(router); 

// Mount the app to the DOM 
app.mount('#app');