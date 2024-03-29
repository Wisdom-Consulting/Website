<script setup>
import {ref} from 'vue'
import {useMySpaceStore} from "@/stores/MySpace";
import SwiperCore, {A11y, Navigation, Pagination, Scrollbar} from 'swiper';
import {Swiper, SwiperSlide} from 'swiper/vue';
import {useAuthStore} from "@/stores/Auth";
import {useDashboardStore} from "@/stores/Dashboard";
import 'swiper/css'
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import {Modal} from "flowbite-vue";

SwiperCore.use([Navigation, Pagination, Scrollbar, A11y]);
const mySpaceStore = useMySpaceStore()
const dashboardStore = useDashboardStore()
const authStore = useAuthStore()
await mySpaceStore.getQuizzes(13)

// watch and react to changes in the value of a reactive object
// watchEffect(() => {
//   console.log(mySpaceStore.quizzes)
// })


const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}

let Index = 0

function showModal(index) {
    Index = index
    isShowModal.value = true
}
</script>

<template>
    <Modal :size="size" v-if="isShowModal" @close="closeModal">
        <template #body>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                Are you sure you want to delete this quiz?
            </p>
        </template>
        <template #footer>
            <div class="flex justify-between">
                <button @click="closeModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Cancel
                </button>
                <button @click="dashboardStore.clicked()" type="button"
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600">
                    Yes, I am sure
                </button>
            </div>
        </template>
    </Modal>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-10 max-w-6xl">
        <swiper class="flex justify-center"
                :modules="modules"
                :slides-per-view="3"
                :space-between="30"
                navigation
                :pagination="{ clickable: true }"
                @swiper="onSwiper"
                @slideChange="onSlideChange"
        >
            <swiper-slide v-for="(quiz, index) in mySpaceStore.quizzes" :key="quiz.id">
                <div class="bg-white shadow-lg rounded-lg w-full h-fit p-2 md:p-6 flex flex-col gap-2 self-center">
                    <div class="flex gap-2">
                        <img v-bind:src="'./src/assets/eye.png'" class="w-5" alt="">
                        <span class="text-[#003333] text-sm"> 5 min</span>
                    </div>
                    <div class="flex flex-row gap-2 text-center justify-center font-bold h-10 mb-1 text-xs md:text-sm">
                        <h1 class="text-[#00333] text-md">{{ quiz.title }}</h1>
                    </div>
                    <div class="flex flex-col gap-4 justify-center text-center">
                        <h3 class="font-medium text-[15px] text-wrap text-[#003333] h-20 mb-1 hidden md:flex">
                            {{ quiz.body.slice(0, 100) }}</h3>
                    </div>
                    <!--          Pass quiz button-->
                    <div class="flex flex-row gap-2 text-center justify-center mt-2">
                        <div v-if="authStore.authRole[0] === 'admin'"
                             class="flex gap-2 flex-wrap items-center justify-center">
                            <button @click="dashboardStore.loadUpdateQuizPage(quiz.id)"
                                    class="bg-[#DDDDDD] text-[#003333] text-sm font-bold py-2 px-4 rounded-full self-center">
                                Edit
                            </button>
                            <button @click="showModal(index)" type="button"
                                    class="bg-[#CE7A63] text-white text-sm font-bold py-2 px-4 rounded-full self-center">
                                Delete
                            </button>
                        </div>
                        <div v-else>
                            <button @click="mySpaceStore.loadTest(quiz.id)"
                                    class="bg-[#003333] text-white text-sm font-bold py-2 px-4 rounded-full">Pass Quiz
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-row gap-2 text-center justify-center mt-2">
                        <span class="text-[#003333] text-md font-bold">{{ quiz.level.name }}</span>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>