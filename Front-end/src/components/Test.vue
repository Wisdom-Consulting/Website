<script setup>
import {ref, computed} from 'vue'
import {useMySpaceStore} from '@/stores/MySpace'

const mySpaceStore = useMySpaceStore()
const title = ref(mySpaceStore.test.title)
const body = ref(mySpaceStore.test.body)
const quizField = ref(mySpaceStore.test.quiz_field.name)
const quizLevel = ref(mySpaceStore.test.level.name)
const questions = ref(mySpaceStore.test.question)
const quizCompleted = ref(false)
const currentQuestion = ref(0)
let selected = ref(null)
let correct = ref(null)
let question = ref(null)

// const score = computed(() => {
//     let value = 0
//     questions.answer.map(a => {
//         if (a.is_correct === true ) {
//             console.log('correct');
//             value++
//         }
//     })
//     return value
// })
const getCurrentQuestion = computed(() => {
    question.value = questions.value[currentQuestion.value]
    // console.log(question.value.answer)
    question.index = currentQuestion.value
    // assign the correct answer to the correct property
    question.value.answer.map(a => {
        if (a.is_correct === 0) {
            correct.value = a.id
            // console.log(correct.value)
        }
    })

    return question
})
const SetAnswer = (e) => {
    selected = e.target.body
    // e.target.value = null
}
const NextQuestion = () => {
    if (currentQuestion.value < questions.value.length - 1) {
        currentQuestion.value++
        selected = null
        console.log(correct.value)
        return
    }

    quizCompleted.value = true
}
</script>

<template>
    <main class="app">
        <h1>{{ title }}</h1>

        <section class="bg-[#003333] rounded-md p-10 w-full" v-if="!quizCompleted">
            <div class="flex flex-col mb-5">
                <span class="self-end text-white">Score {{ score }}/{{ questions.length }}</span>
                <span class="self-center text-white text-xl">{{ getCurrentQuestion.value.body }}</span>
            </div>

            <div class="flex flex-col gap-4">
                <label
                        v-for="(answer, index) in getCurrentQuestion.value.answer"
                        :key="answer.id"
                        :for="'answer' + index"
                        :class="`answer option bg-white rounded-3xl p-2 ${selected === answer.id &&  answer.id === correct ? 'correct' : 'wrong'} ${selected !== null &&  answer.id === selected ? 'disabled' : ''} ${correct === selected ? 'correct' : 'wrong'} ${correct === selected ? 'disabled'	: ''}`">

                    <input
                            type="radio"

                            :id="'answer' + index"
                            :name="answer.body"
                            :value="answer.id"
                            v-model="selected"
                            :disabled="selected"
                            @change="SetAnswer"
                    />
                    <span>{{ answer.body }}</span>
                </label>
            </div>

            <button class="p-4 bg-white text-[#003333] rounded-3xl mt-5"
                    @click="NextQuestion"
                    :disabled="!selected">
                {{
                getCurrentQuestion.index === questions.length - 1
                    ? 'Finish'
                    : getCurrentQuestion.selected == null
                        ? 'Select an option'
                        : 'Next question'
                }}
            </button>
        </section>

        <section v-else>
            <h2>You have finished the quiz!</h2>
            <p>Your score is {{ score }}/{{ questions.length }}</p>
        </section>
    </main>
</template>

<style scoped>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

/*body {*/
/*    background-color: #271c36;*/
/*    color: #FFF;*/
/*}*/

.app {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 2rem;
    height: 100vh;
}

h1 {
    font-size: 2rem;
    margin-bottom: 2rem;
}

.quiz {
    background-color: #382a4b;
    padding: 1rem;
    width: 100%;
    max-width: 640px;
}

.quiz-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.quiz-info .question {
    color: #8F8F8F;
    font-size: 1.25rem;
}

.quiz-info.score {
    color: #FFF;
    font-size: 1.25rem;
}

.options {
    margin-bottom: 1rem;
}

/*.option {*/
/*    padding: 1rem;*/
/*    display: flex;*/
/*    flex-direction: column;*/
/*    background-color: #271c36;*/
/*    margin-bottom: 0.5rem;*/
/*    border-radius: 0.5rem;*/
/*    cursor: pointer;*/
/*}*/

.option:hover {
    background-color: #2d213f;
}

.option.correct {
    background-color: #2cce7d;
}

.option.wrong {
    background-color: #ff5a5f;
}

.option:last-of-type {
    margin-bottom: 0;
}

.option.disabled {
    opacity: 0.5;
}

.option input {
    display: none;
}

/*button {*/
/*    appearance: none;*/
/*    outline: none;*/
/*    border: none;*/
/*    cursor: pointer;*/
/*    padding: 0.5rem 1rem;*/
/*    background-color: #2cce7d;*/
/*    color: #2d213f;*/
/*    font-weight: 700;*/
/*    text-transform: uppercase;*/
/*    font-size: 1.2rem;*/
/*    border-radius: 0.5rem;*/
/*}*/

button:disabled {
    opacity: 0.5;
}

h2 {
    font-size: 2rem;
    margin-bottom: 2rem;
    text-align: center;
}

p {
    color: #8F8F8F;
    font-size: 1.5rem;
    text-align: center;
}
</style>