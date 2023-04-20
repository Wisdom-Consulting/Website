<script setup>
import {usePostStore} from "@/stores/Post";
import {ComboboxLabel} from "@headlessui/vue";
import {ref} from "vue";
import {Button, Input, Modal} from "flowbite-vue";
import {useAuthStore} from "@/stores/Auth";

const postStore = usePostStore()

await postStore.getPosts();

let comment = ref(0)

const isShowModal = ref(false)

let post = ref({
    body: '',
})

function closeModal() {
    isShowModal.value = false
}

function showModal() {
    isShowModal.value = true
}
</script>

<template>
    <div class="flex justify-end mx-10">
        <button @click="showModal" type="button" class="bg-[#003333] text-white rounded-lg px-4 py-2 mt-5">Add post
        </button>
        <Modal v-if="isShowModal" @close="closeModal">
            <template #header>
                <div class="flex items-center text-lg">
                    New post
                </div>
            </template>
            <template #body>
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
                    <button @click="postStore.createPost(post)" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Publish
                    </button>
                </div>
            </template>
        </Modal>
    </div>
    <div v-for="post in postStore.allPosts" class="flex flex-col flex-wrap justify-center gap-1 self-center">
        <div
                class="bg-white shadow-lg rounded-lg w-full sm:w-[560px] md:w-[560px] h-[300px] sm:h-[200px] p-6 mx-5 mt-5 flex flex-col justify-between gap-2">
            <div class="flex gap-2 justify-between">
                <div class="flex gap-2">
                    <img :src="post.user.image ? post.user.image : './src/assets/consultant_male.png'"
                         class="w-8 rounded-full border-[#003333] border-[2px]" alt="">
                    <span class="text-[#003333] text-sm self-center">{{ post.user.name }}</span>
                </div>
                <div class="flex gap-2">
                    <!--                    Edit post button-->
                    <button v-if="post.user.id === useAuthStore().user.id" @click="postStore.loadPost(post.id)"
                            class="flex justify-between align-center content-center gap-2">
                        Edit
                    </button>
                    <!--                    Delete post button-->
                    <button v-if="post.user.id === useAuthStore().user.id" @click="postStore.deletePost(post.id)"
                            class="flex justify-between align-center content-center gap-2">
                        Delete
                    </button>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="font-medium text-[15px] text-wrap text-[#003333]">
                    {{ post.body.length > 200 ? post.body.slice(0, 200) + '...' : post.body }}
                </h3>
                <button @click="postStore.showPost(post.id)" class="text-black">Read more</button>
            </div>
            <div class="flex flex-row gap-2 justify-around">
                <span class="text-[#003333] text-xs self-center">{{ post.likes.length }} likes</span>
                <span class="text-[#003333] text-xs self-center">{{ post.comments.length }} comments</span>
                <span class="text-[#003333] text-xs self-center">{{ post.created_at.slice(0, 10) }}</span>
            </div>
            <!--            Comments section-->
        </div>
    </div>
</template>