<script setup>
import {ref, watch} from "vue";
import {useMySpaceStore} from "@/stores/MySpace";
import {useDashboardStore} from "@/stores/Dashboard";
import {useAuthStore} from "@/stores/Auth";
import {useToast} from "vue-toastification";

const mySpaceStore = useMySpaceStore();
const dashboardStore = useDashboardStore();
const authStore = useAuthStore();
let step = ref(1);
let QuestionsCount = ref(1);
let steps = 2;

watch(QuestionsCount, (newValue) => {
    console.log(QuestionsCount.value);
    steps = ref(QuestionsCount.value + 1);
    if (newValue < 1) {
        QuestionsCount.value = 1;
    }
});


console.log(steps);

let QuizData = ref({
    title: "",
    body: "",
    level_id: "",
    quiz_field_id: null,
    questions: [],
});

let QuestionData = ref({
    body: "",
    answers: [
        {
            body: "",
            is_correct: false,
        },
        {
            body: "",
            is_correct: false,
        },
        {
            body: "",
            is_correct: false,
        },
        {
            body: "",
            is_correct: false,
        },
    ],
});

function nextStep() {
    if (step.value !== 1) {
        QuizData.value.questions.push(QuestionData.value);
        console.log(QuizData.value)
        QuestionData.value = {
            body: "",
            answers: [
                {
                    body: "",
                    is_correct: false,
                },
                {
                    body: "",
                    is_correct: false,
                },
                {
                    body: "",
                    is_correct: false,
                },
                {
                    body: "",
                    is_correct: false,
                },
            ],
        };
        step.value++;
    } else {
        step.value++;
    }
}

function finish() {
    QuizData.value.questions.push(QuestionData.value);
    if (dashboardStore.updateQuiz(QuizData.value)){
        step.value++;
    }else {
        // Push to dashboard
        this.$router.push("/academy");
        // Toast error
        useToast().error("Error updating quiz");
    }
}

function loadQuiz() {
    QuizData.value = dashboardStore.quiz;
    QuestionsCount.value = QuizData.value.questions.length;
    steps = QuestionsCount.value + 1;
    console.log(QuizData.value);
}

await mySpaceStore.getQuizFields();
await mySpaceStore.getLevels();
</script>

<template>
    <div class="justify-center items-center">
        <div class="max-w-3xl h-full mx-auto">
            <Transition>
                <div class="pad" v-if="step === steps + 1">
                    <div
                            class="bg-white rounded-lg p-10 flex items-center shadow justify-between"
                    >
                        <div>
                            <svg
                                    class="mb-4 h-20 w-20 text-green-500 mx-auto"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                            >
                                <path
                                        fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"
                                />
                            </svg>

                            <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">
                                Quiz updated successfully
                            </h2>

                            <div class="text-gray-600 mb-8">
                                <p class="text-center">
                                    You have successfully update the quiz
                                </p>
                            </div>

                            <RouterLink
                                    to="/dashboard"
                                    class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                            >
                                Ok
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </Transition>

            <Transition>
                <div class="pad" v-if="step !== steps + 1">
                    <!-- step 1 -->
                    <div class="border-b-2 py-4">
                        <div
                                class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                        ></div>
                        <div
                                class="flex flex-col md:flex-row md:items-center md:justify-between"
                        >
                            <div class="flex-1 text-lg font-bold text-gray-700 leading-tight">
                                Step: {{ step }} of {{ steps }}
                            </div>

                            <div class="flex items-center md:w-64">
                                <div class="w-full bg-white rounded-full mr-2">
                                    <div
                                            class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                            :style="
                      'width: ' +
                      parseInt((step / steps) * 100) +
                      '%; transition: width 0.3s ease-in-out;'
                    "
                                    ></div>
                                </div>
                                <div class="text-xs w-10 text-gray-600">
                                    {{ parseInt((step / steps) * 100) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-10">
                        <div v-if="step === 1">
                            <div class="mb-5 text-center">
                                <label
                                        for="fileInput"
                                        class="font-bold mb-1 text-[#003333] block"
                                >
                                    Quiz title
                                </label>
                                <input
                                        type="text"
                                        class="w-full px-4 py-3 border-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        name="title"
                                        id="title"
                                        v-model="QuizData.title"
                                />
                            </div>
                            <div class="mb-5 text-center">
                                <label
                                        for="description"
                                        class="font-bold mb-1 text-[#003333] block"
                                >
                                    Quiz description
                                </label>
                                <textarea
                                        type="text"
                                        class="w-full px-4 py-3 border-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        name="description"
                                        id="description"
                                        v-model="QuizData.body"
                                ></textarea>
                            </div>
                            <div class="mb-5 text-center">
                                <label
                                        for="quiz_field_id"
                                        class="font-bold mb-1 text-[#003333] block"
                                >
                                    Quiz field
                                </label>
                                <select
                                        class="w-full px-4 py-3 border-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        name="filed"
                                        id="field"
                                        v-model="QuizData.quiz_field_id"
                                >
                                    <option
                                            v-for="field in mySpaceStore.fields"
                                            :value="field.id"

                                    >
                                        {{ field.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-5 text-center">
                                <label
                                        for="fileInput"
                                        class="font-bold mb-1 text-[#003333] block"
                                >
                                    Quiz level
                                </label>
                                <select
                                        class="w-full px-4 py-3 border-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                        name="level"
                                        id="level"
                                        v-model="QuizData.level_id"
                                >
                                    <option
                                            v-for="level in mySpaceStore.Levels"
                                            :value="level.id"
                                    >
                                        {{ level.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- step n > 1 && n < steps -->
                        <transition v-for="question in QuestionsCount">
                            <div v-if="step === question + 1">
                                <div class="mb-5">
                                    <label
                                            for="questionBody"
                                            class="font-bold mb-1 text-gray-700 block"
                                    >Question {{ question }}</label
                                    >
                                    <textarea
                                            type="text"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-[#003333] focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="your question body..."
                                            v-model="QuestionData.body"
                                    ></textarea>
                                </div>
                                <div class=" flex flex-col gap-2">
                                    <div class="flex gap-2 justify-center align-content-center">
                                        <input
                                                name=""
                                                id=""
                                                type="text"
                                                class="border border-[#003333] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Option 1"
                                                v-model="QuestionData.answers[0].body"
                                        />
                                        <input id="teal-radio" type="checkbox"
                                               v-model="QuestionData.answers[0].is_correct"
                                               name="colored-radio"
                                               class="self-center w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div class="flex gap-2 justify-center align-content-center">
                                        <input
                                                name=""
                                                id=""
                                                type="text"
                                                class="border border-[#003333] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Option 1"
                                                v-model="QuestionData.answers[1].body"
                                        />
                                        <input id="teal-radio" type="checkbox"
                                               v-model="QuestionData.answers[1].is_correct"
                                               name="colored-radio"
                                               class="self-center w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div class="flex gap-2 justify-center align-content-center">
                                        <input
                                                name=""
                                                id=""
                                                type="text"
                                                class="border border-[#003333] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Option 1"
                                                v-model="QuestionData.answers[2].body"
                                        />
                                        <input id="teal-radio" type="checkbox"
                                               v-model="QuestionData.answers[2].is_correct"
                                               name="colored-radio"
                                               class="self-center w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <div class="flex gap-2 justify-center align-content-center">
                                        <input
                                                name=""
                                                id=""
                                                type="text"
                                                class="border border-[#003333] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="Option 1"
                                                v-model="QuestionData.answers[3].body"
                                        />
                                        <input id="teal-radio" type="checkbox"
                                               v-model="QuestionData.answers[3].is_correct"
                                               name="colored-radio"
                                               class="self-center w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </Transition>

            <div class="py-5 bg-white" v-if="step !== steps + 1">
                <div class="max-w-3xl mx-auto px-4">
                    <div class="flex justify-between">
                        <div class="w-1/2">
                            <button
                                    v-if="step > 1"
                                    @click="step--"
                                    class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                            >
                                Previous
                            </button>
                        </div>

                        <div class="w-1/2 text-right">
                            <button
                                    v-if="step < steps"
                                    @click="nextStep"
                                    class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                            >
                                Next
                            </button>

                            <button
                                    @click="finish"
                                    v-if="step === steps"
                                    class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                            >
                                Finish
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>