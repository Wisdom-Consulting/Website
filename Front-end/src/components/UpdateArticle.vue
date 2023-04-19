<script setup>

import {useConsultancyStore} from "@/stores/Consultancy";
import {ref} from "vue";

const consultancyStore = useConsultancyStore()

let data = ref(consultancyStore.article)

</script>
<template>

  <!-- component -->
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">Update Post</div>
    <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <input v-model="data.title" class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false"
                   placeholder="Title" type="text">
        <div class="px-4 py-2 bg-white rounded-b-lg">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select
                an Category</label>
            <select v-model="data.category_id" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option :value="data.category_id" selected>{{data.category.name}}</option>
                <option v-for="category in consultancyStore.categories" :value="category.id" selected>
                    {{ category.name }}
                </option>
            </select>
        </div>
        <textarea v-model="data.body"
                  class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                  spellcheck="false"
                  placeholder="Describe everything about this post here">
        </textarea>
        <!-- buttons -->
        <div class="buttons flex">
            <RouterLink to="/mySpace" class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel
            </RouterLink>
            <div @click="consultancyStore.updateArticle(data)" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">
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