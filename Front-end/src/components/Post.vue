<script setup>
import {usePostStore} from "@/stores/Post";
import {onMounted, ref} from "vue";
import {useAuthStore} from "@/stores/Auth";

const postStore = usePostStore()

let comment = ref({
    body: '',
    post_id: postStore.onePost.id,
})

function likePost(postId) {
    postStore.likePost(postId)
}
function dislikePost(postId) {
    postStore.dislikePost(postId)
}

function commentPost(comment) {
    postStore.addComment(comment)
//     empty comment field
    comment.body = ''
}


const isLiked = ref(false);

function likeClicked() {
    isLiked.value = !isLiked.value;
    if (isLiked.value) {
        likePost(postStore.onePost.id)
    } else {
        dislikePost(postStore.onePost.id)
    }
}

// await consultancyStore.getArticles(page.value)

</script>

<template>
    <div class="flex flex-col flex-wrap justify-center gap-1 self-center mb-5">
        <div
                class="bg-white shadow-lg rounded-lg w-full sm:w-[560px] md:w-[560px] h-[300px] sm:h-[200px] p-6 mx-5 mt-5 flex flex-col justify-between gap-2">
            <div class="flex gap-2 justify-between">
                <div class="flex gap-2">
                    <img :src="postStore.onePost.user.image ? postStore.onePost.user.image : './src/assets/consultant_male.png'"
                         class="w-8 rounded-full border-[#003333] border-[2px]" alt="">
                    <span class="text-[#003333] text-sm self-center">{{ postStore.onePost.user.name }}</span>
                </div>
                <div class="flex gap-2">
                    <!--                    Edit post button-->
                    <button v-if="postStore.onePost.user.id === useAuthStore().user.id"
                            @click="postStore.loadPost(postStore.onePost.id)"
                            class="flex justify-between align-center content-center gap-2">
                        Edit
                    </button>
                    <!--                    Delete post button-->
                    <button v-if="postStore.onePost.user.id === useAuthStore().user.id"
                            @click="postStore.deletePost(postStore.onePost.id)"
                            class="flex justify-between align-center content-center gap-2">
                        Delete
                    </button>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h3 class="font-medium text-[15px] text-wrap text-[#003333]">{{ postStore.onePost.body }}
                </h3>
            </div>
            <div class="flex flex-row gap-2 justify-around">
                <!--                <span class="text-[#003333] text-xs self-center">{{ post.likes.length }} likes</span>-->
                <div class="flex justify-between align-center content-center gap-2">
                    <button type="submit" @click="likeClicked"
                            class="flex justify-between align-center content-center gap-2">
                        <svg width="20" height="80" viewBox="0 0 88 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 80H16V32H0V80ZM88 36C88 31.6 84.4 28 80 28H54.76L58.56 9.72L58.68 8.44C58.68 6.8 58 5.28 56.92 4.2L52.68 0L26.36 26.36C24.88 27.8 24 29.8 24 32V72C24 76.4 27.6 80 32 80H68C71.32 80 74.16 78 75.36 75.12L87.44 46.92C87.8 46 88 45.04 88 44V36Z" :fill="isLiked ? '#003333' : 'black'"/>
                        </svg>



                        <span class="text-[#003333] text-xs self-center">{{
                            postStore.onePost.likes.length
                            }} likes</span>
                    </button>
                </div>
                <span class="text-[#003333] text-xs self-center">{{ postStore.onePost.comments.length }} comments</span>
                <span class="text-[#003333] text-xs self-center">{{ postStore.onePost.created_at.slice(0, 10) }}</span>
            </div>
            <!--            Comments section-->
        </div>
        <div class="frame-comment bg-white shadow-lg rounded-lg w-full sm:w-[460px] md:w-[460px] h-fit p-6 mx-5 flex flex-col justify-between gap-2">
            <!--            Add comment input-->
            <div class="flex justify-between align-center content-center">
                <input v-model="comment.body" type="text" class="rounded-3xl bg-[#DDDDDD] w-full h-8 border-none">
                <button type="submit" @click.prevent="commentPost(comment)" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#003333"
                         class="ml-2 h-6 w-6 rotate-90 transform">
                        <path
                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                    </svg>
                </button>
                <!--            Like button-->

            </div>

            <div class="flex flex-col justify-start gap-2">
                <div class="max-h-60 overflow-y-scroll">
                <div v-if="postStore.onePost.comments.length === 0" class="flex flex-wrap">
                    <p class="text-xs ">No comments on this post, be the first!</p>
                </div>
                    <div v-else v-for="comment in postStore.onePost.comments"
                         class="flex flex-col gap-2">
                        <hr class="border-t border-gray-300 my-4">
                        <div class="flex gap-2">
                            <img class="w-[30px] h-[30px] rounded-full"
                                 :src="comment.user.image ? postStore.onePost.user.image : './src/assets/consultant_male.png'"
                                 alt="">
                            <span class="text-[#003333] text-xs self-center">{{ comment.user.name }}</span>
                        </div>
                        <p class="text-xs flex flex-wrap">{{ comment.body }}</p>
                        <div class="flex justify-between align-center content-center">

                            <span class="text-[#003333] text-xs self-center">{{
                                comment.created_at.slice(0, 10)
                                }}</span>
                            <span class="text-[#003333] text-xs self-center">{{
                                comment.created_at.slice(11, 20)
                                }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>