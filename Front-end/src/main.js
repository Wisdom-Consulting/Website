import {createApp, markRaw} from 'vue'
import {createPinia} from 'pinia'
import './axios'
import App from './App.vue'
import router from './router'

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


const pinia = createPinia();
pinia.use(({store}) => {
    store.router = markRaw(router);
})

const app = createApp(App)

app.use(pinia)
app.use(router)
app.component("font-awesome-icon", FontAwesomeIcon)

app.mount('#app')
