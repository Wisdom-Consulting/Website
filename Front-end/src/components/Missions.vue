<script setup>
import {onMounted, ref} from 'vue'
import {Listbox, ListboxButton, ListboxOption, ListboxOptions} from '@headlessui/vue'
import {CheckIcon, ChevronUpDownIcon} from '@heroicons/vue/20/solid'

import {useMySpaceStore} from '@/stores/MySpace'
import {useAuthStore} from "@/stores/Auth";

const mySpaceStore = useMySpaceStore()
const authStore = useAuthStore()

// onMounted(async () => {
await mySpaceStore.getQuizFields()

// await mySpaceStore.getQuizFields()
let selected = ref(mySpaceStore.fields[0])

mySpaceStore.SelectedField = selected.id
</script>

<template>
    <h1 class="font-bold text-[30px] text-wrap text-[#003333] flex mx-auto justify-center mt-20">Missions</h1>
<!--    Add quiz button-->
    <div v-if="authStore.authRole[0] === 'admin'" class="flex flex-row gap-2 text-center justify-center items-center mt-2">
        <RouterLink to="/dashboard/addQuiz"
                class="bg-[#DDDDDD] text-white text-3xl font-bold py-1 px-4 rounded-md self-center">+
        </RouterLink>
    </div>
    <div class="flex items-center justify-center mt-5">
        <Listbox as="div" v-model="selected">
            <div class="relative mt-2">
                <ListboxButton
                        class="relative w-[300px] cursor-default rounded-3xl bg-[#003333] py-1.5 pl-3 pr-10 text-center text-white shadow-sm focus:outline-none sm:text-sm sm:leading-6">
        <span class="flex items-center">
          <span class="ml-3 block truncate">{{ selected.name }}</span>
        </span>
                    <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
          <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
        </span>
                </ListboxButton>

                <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                            leave-to-class="opacity-0">
                    <ListboxOptions @click="mySpaceStore.getQuizzes(selected.id)"
                            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                        <ListboxOption as="template" v-for="field in mySpaceStore.fields" :key="field.id" :value="field"
                                       v-slot="{ active, selected }">
                            <li :class="[active ? 'bg-[#003333] text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
                                <div class="flex items-center">
                    <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">{{
                        field.name
                        }}</span>
                                </div>

                                <span v-if="selected"
                                      :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                  <CheckIcon class="h-5 w-5 text-[#003333]" aria-hidden="true"/>
                </span>
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox>
    </div>
</template>