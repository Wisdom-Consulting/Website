import {createRouter, createWebHistory} from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Login from "../views/Login.vue";
import Signup from "@/views/Signup.vue";
import Academy from "../views/Academy.vue";
import Community from "@/views/Community.vue";
import MySpace from "@/views/MySpace.vue";
import Consulting from "@/views/Consulting.vue";
import Dashboard from "@/views/Dashboard.vue";
import Profile from "@/views/Profile.vue";
import Inbox from "@/views/Inbox.vue";
import NotFound from "@/views/NotFound.vue";
import AddQuiz from "@/views/AddQuiz.vue";
import EditQuiz from "@/components/editQuiz.vue";
import {useLocalStorage} from "@vueuse/core";
import EditArticle from "@/views/EditArticle.vue";



const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView
        },
        {
            path: '/about',
            name: 'about',
            component: () => import('../views/AboutView.vue')
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                requiresGuest: true
            }
        },
        {
            path: '/signup',
            name: 'signup',
            component: Signup,
            meta: {
                requiresGuest: true
            }
        },
        {
            name: 'academy',
            path: '/academy',
            component: Academy
        },
        {
            name: 'Community',
            path: '/community',
            component: Community
        },
        {
            name: 'My Space',
            path: '/myspace',
            component: MySpace,
            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'Consulting',
            path: '/consulting',
            component: Consulting,
            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'Dashboard',
            path: '/dashboard',
            component: Dashboard,
            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'Profile',
            path: '/profile',
            component: Profile,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/inbox',
            name: 'Inbox',
            component: Inbox,
            meta: {
                requiresAuth: true
            }

        },
        {
            path: '/dashboard/addQuiz',
            name: 'AddQuiz',
            component: AddQuiz,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/dashboard/editQuiz',
            name: 'EditQuiz',
            component: EditQuiz,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/consulting/editArticle/:id',
            name: 'EditQuiz',
            component: EditArticle,
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/:pathMatch(.*)*',
            name: 'NotFound',
            component: NotFound
        }
    ]
})

// router.beforeEach((to, from, next) => {
//     const isLoggedIn = useLocalStorage('isLoggedIn', false)// or use your preferred method of checking if the user is logged in
//     const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
//     const requiresGuest = to.matched.some(record => record.meta.requiresGuest)
//
//     if (requiresAuth && !isLoggedIn) {
//         next('/login')
//     } else if (requiresGuest && isLoggedIn) {
//         next('/')
//     } else {
//         next()
//     }
// })

export default router
