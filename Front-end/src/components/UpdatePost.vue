<script setup>

import {usePostStore} from "@/stores/Post";
import {ref} from "vue";

const postStore = usePostStore()

let data = ref(postStore.post)

</script>
<template>

  <!-- component -->
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">Update Post</div>
    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <textarea v-model="data.body"
                  class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                  spellcheck="false"
                  placeholder="Describe everything about this post here">
        </textarea>
        <!-- buttons -->
        <div class="buttons flex">
            <RouterLink to="/mySpace" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel
            </RouterLink>
            <div @click="postStore.updatePost(data)" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
                Update
            </div>
        </div>
    </div>

</template>

<style scoped>
body {
    background: white !important;
}
</style>