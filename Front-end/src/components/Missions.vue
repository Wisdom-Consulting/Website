<script setup>
import {onMounted, ref} from 'vue'
  import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
  import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
  import { useMySpaceStore } from '@/stores/MySpace'



  const mySpaceStore = useMySpaceStore()
  const fields = []

  onMounted(async () => {
    const fields = await mySpaceStore.getQuizFields()
  })

  const selected = ref(fields[0])
</script>

<template>
  <h1 class="font-bold text-[30px] text-wrap text-[#003333] flex mx-auto justify-center mt-20">Missions</h1>
  <div class="flex items-center justify-center mt-5">
  <Listbox as="div" class="w-fit self-center items-center" v-model="selected">
    <div class="relative mt-2">
      <ListboxButton
          class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6">
        <span class="flex items-center">
          <img :src="selected.avatar" alt="" class="h-5 w-5 flex-shrink-0 rounded-full"/>
          <span class="ml-3 block truncate">{{ selected.name }}</span>
        </span>
        <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
          <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
        </span>
      </ListboxButton>

      <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                  leave-to-class="opacity-0">
        <ListboxOptions
            class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
          <ListboxOption as="template" v-for="field in fields" :key="field.id" :value="field"
                         v-slot="{ active, selected }">
            <li :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']">
              <div class="flex items-center">
                <img :src="person.avatar" alt="" class="h-5 w-5 flex-shrink-0 rounded-full"/>
                <span :class="[selected ? 'font-semibold' : 'font-normal', 'ml-3 block truncate']">{{
                    person.name
                  }}</span>
              </div>

              <span v-if="selected"
                    :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                <CheckIcon class="h-5 w-5" aria-hidden="true"/>
              </span>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>
  </div>
</template>