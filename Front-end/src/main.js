import {createApp, markRaw} from 'vue'
import {createPinia} from 'pinia'
import './axios'
import App from './App.vue'
import router from './router'
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";


import './index.css'
import './assets/tailwind.css'
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faSearch } from '@fortawesome/free-solid-svg-icons'
/* add icons to the library */
library.add(faSearch)
// Imort the vue-awesome-paginate
import VueAwesomePaginate from "vue-awesome-paginate";
// import the necessary css file
import "vue-awesome-paginate/dist/style.css";

const pinia = createPinia();
pinia.use(({store}) => {
    store.router = markRaw(router);
})

const app = createApp(App)

app.use(pinia)
app.use(router)
app.use(VueAwesomePaginate)
// app.component("paginate", VueAwesomePaginate);

const options = {
    // You can set your default options here
};
app.use(Toast, options);
// app.use(ReadMore);
app.component("font-awesome-icon", FontAwesomeIcon)

app.mount('#app')
