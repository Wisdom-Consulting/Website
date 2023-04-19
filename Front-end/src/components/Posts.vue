<script setup>
import {usePostStore} from "@/stores/Post";
import {ComboboxLabel} from "@headlessui/vue";
import {ref} from "vue";

const postStore = usePostStore()

await postStore.getPosts();

let comment = ref(0)
</script>

<template>
    <div v-for="post in postStore.allPosts" class="flex flex-col flex-wrap justify-center gap-1 self-center">
        <div
                class="bg-white shadow-lg rounded-lg w-full sm:w-[560px] md:w-[560px] h-[300px] sm:h-[200px] p-6 mx-5 mt-5 flex flex-col justify-between gap-2">
            <div class="flex gap-2 justify-start">
                <img :src="post.user.image ? post.user.image : './src/assets/consultant_male.png'"
                     class="w-8 rounded-full border-[#003333] border-[2px]" alt="">
                <span class="text-[#003333] text-sm self-center">{{ post.user.name }}</span>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="font-medium text-[15px] text-wrap text-[#003333]">{{ post.body.slice(0, 130) }}...
                    <RouterLink to="" class="text-black">Read more</RouterLink>
                </h3>
            </div>
            <div class="flex flex-row gap-2 justify-around">
                <span class="text-[#003333] text-xs self-center">{{ post.created_at.slice(0, 10) }}</span>
                <span class="text-[#003333] text-xs self-center">{{ post.likes.length }} likes</span>
                <span class="text-[#003333] text-xs self-center">{{ post.comments.length }} comments</span>
            </div>
<!--            Comments section-->
        </div>
        <div class="frame-comment bg-white shadow-lg rounded-lg w-full sm:w-[460px] md:w-[460px] h-fit p-6 mx-5 flex flex-col justify-between gap-2">
<!--            Add comment input-->
            <div class="flex justify-between align-center content-center">
                <input v-model="comment" type="text" class="rounded-3xl bg-[#DDDDDD] w-full border-none">
                <button type="submit" @click.prevent="postStore.addComment(post.id, comment)"
                        class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#003333"
                         class="ml-2 h-6 w-6 rotate-90 transform">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col justify-start">
                <div v-for="comment in post.comments" class="flex flex-wrap">
                    <img class="w-[30px]" :src="comment.user.image ? post.user.image : './src/assets/consultant_male.png'" alt="">
                    <p class="text-xs ">{{comment.body}}</p>
                </div>
            </div>
        </div>
    </div>
</template>