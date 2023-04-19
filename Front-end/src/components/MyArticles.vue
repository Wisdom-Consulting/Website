<script setup>
import {useConsultancyStore} from "@/stores/Consultancy";
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";
import {ref} from "vue";

const consultancyStore = useConsultancyStore()

let page = ref(1)

await consultancyStore.getMyArticles(page.value)
await consultancyStore.getCategories()

import {Modal} from 'flowbite-vue'
import {Input, Button} from 'flowbite-vue'

const isShowModal = ref(false)

let post = ref({
    title: '',
    body: '',
    category_id: '',
})

function closeModal() {
    isShowModal.value = false
}

function showModal() {
    isShowModal.value = true
}
</script>

<template>
  <!--    Add article button-->
    <div class="flex justify-end mx-10">
        <button @click="showModal" type="button" class="bg-[#003333] text-white rounded-lg px-4 py-2 mt-5">Add article
        </button>
        <Modal v-if="isShowModal" @close="closeModal">
            <template #header>
                <div class="flex items-center text-lg">
                    Article
                </div>
            </template>
            <template #body>
                <div class="px-4 py-2 bg-white rounded-b-lg">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input v-model="post.title" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                <div class="px-4 py-2 bg-white rounded-b-lg">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        an Category</label>
                    <select v-model="post.category_id" id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option v-for="category in consultancyStore.categories" :value="category.id" selected>{{category.name}}</option>
                    </select>
                </div>
                <div class="px-4 py-2 bg-white rounded-b-lg">
                    <label for="editor" class="sr-only">Publish post</label>
                    <textarea v-model="post.body" id="editor" rows="8"
                              class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                              placeholder="Write your article..." required></textarea>
                </div>
            </template>
            <template #footer>
                <div class="flex justify-between">
                    <button @click="closeModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </button>
                    <button @click="consultancyStore.addArticle(post)" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Publish
                    </button>
                </div>
            </template>
        </Modal>
    </div>
    <div class="flex flex-col border-lg border-black gap-2 mt-20">
        <div v-for="article in consultancyStore.myContent" class="flex  flex-row flex-wrap gap-2 justify-center">
            <div
                    class="bg-white shadow-lg rounded-lg w-full sm:w-[560px] md:w-[560px] h-[300px] sm:h-[200px] p-6 m-5 flex flex-col justify-between gap-2">
                <div class="flex gap-2 justify-start md:hidden flex">
                    <img :src="article.user.image ? article.user.image : './src/assets/consultant_male.png'"
                         class="w-8 rounded-full border-[#003333] border-[2px]" alt="">
                    <span class="text-[#003333] text-sm self-center">{{ article.user.name }}</span>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="font-bold text-[15px] text-wrap text-[#003333]">{{ article.title }}</h3>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="font-medium text-[15px] text-wrap text-[#003333]">{{ article.body.slice(0, 130) }}...
                        <RouterLink to="" class="text-black">Read more</RouterLink>
                    </h3>
                </div>
                <div class="flex gap-2">
                    <button @click="consultancyStore.loadArticle(article.id)" class="bg-[#003333] text-white rounded-2xl w-fit px-4 py-2 h-fit self-end">Update</button>
                    <button @click="consultancyStore.deleteArticle(article.id)" class="bg-red-900 text-white rounded-2xl w-fit px-4 py-2 h-fit self-end">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center p-2">
        <VPagination
                v-model="page"
                :pages="consultancyStore.totalPages"
                :range-size="1"
                active-color="#DDDDDD"
                inactive-color="#GHGHGH"
                :show-prev-next="true"
                :show-first-last="true"
                :show-page-size="false"
                @update:modelValue="consultancyStore.getArticles(page)"
        />
    </div>
</template>