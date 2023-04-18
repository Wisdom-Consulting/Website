<script setup>
import Search from "@/components/Search.vue";
import Consultants from "@/components/Consultants.vue";
import Articles from "@/components/Articles.vue";
import Question from "@/components/Question.vue";
import CTA from "@/components/CTA.vue";
import ForYou from "@/components/ForYou.vue";
import {useAuthStore} from "@/stores/Auth";
import Quizzes from "@/components/Quizzes.vue";
import TestCards from "@/components/TestCards.vue";
import Missions from "@/components/Missions.vue";

const authStore = useAuthStore();
</script>

<template>
    <main v-if="authStore.authRole === 'client'">
        <Search/>
        <ForYou/>
        <Consultants/>
        <Articles/>
        <Question/>
        <CTA/>
    </main>
    <main v-else>
        <TestCards/>
        <Suspense>
            <template #default>
                <Missions/>
            </template>
            <template #fallback>
                <div>
                    <section class="bg-white dark:bg-gray-900">
                        <div class="container px-6 py-10 mx-auto animate-pulse">
                            <h1 class="w-48 h-2 mx-auto bg-gray-200 rounded-lg dark:bg-gray-700"></h1>

                            <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                            <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg sm:w-80 dark:bg-gray-700"></p>

                            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="w-full ">
                                    <div class="w-full h-64 bg-gray-300 rounded-lg md:h-72 dark:bg-gray-600"></div>

                                    <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                                    <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                                </div>

                                <div class="w-full ">
                                    <div class="w-full h-64 bg-gray-300 rounded-lg md:h-72 dark:bg-gray-600"></div>

                                    <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                                    <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                                </div>

                                <div class="w-full ">
                                    <div class="w-full h-64 bg-gray-300 rounded-lg md:h-72 dark:bg-gray-600"></div>

                                    <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                                    <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </template>
        </Suspense>
        <Suspense>
            <template #default>
                <Quizzes/>
            </template>
            <template #fallback>
                <div>
                    <section class="bg-white dark:bg-gray-900">
                        <div class="container px-6 py-10 mx-auto animate-pulse">
                            <h1 class="w-48 h-2 mx-auto bg-gray-200 rounded-lg dark:bg-gray-700"></h1>

                            <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                            <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg sm:w-80 dark:bg-gray-700"></p>

                            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-2 lg:grid-cols-3">
                                <div class="w-full ">
                                    <div class="w-full h-64 bg-gray-300 rounded-lg md:h-72 dark:bg-gray-600"></div>

                                    <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                                    <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                                </div>

                                <div class="w-full ">
                                    <div class="w-full h-64 bg-gray-300 rounded-lg md:h-72 dark:bg-gray-600"></div>

                                    <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                                    <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                                </div>

                                <div class="w-full ">
                                    <div class="w-full h-64 bg-gray-300 rounded-lg md:h-72 dark:bg-gray-600"></div>

                                    <h1 class="w-56 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></h1>
                                    <p class="w-24 h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </template>
        </Suspense>
    </main>
</template>