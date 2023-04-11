<script setup></script>

<template>
  <div class="flex w-full gap-2 justify-center">
    <div class=" flex flex-col sm:w-fit w-full mx-4">

      <!-- Search -->
      <div class="py-2 px-2 bg-grey-lightest">
        <input type="text" class="w-full px-2 py-2 text-sm rounded-3xl bg-[#DDDDDD] border-none" placeholder="Search or start new chat"/>
      </div>

      <!-- Contacts -->
      <div class="bg-grey-lighter flex-1 overflow-auto">
        <div class="px-3 flex items-center bg-grey-light cursor-pointer">
          <div>
            <img class="h-12 w-12 rounded-full"
                 src="https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg"/>
          </div>
          <div class="ml-4 flex-1 border-b border-grey-lighter py-4">
            <div class="flex items-bottom justify-between">
              <p class="text-grey-darkest">
                New Movie! Expendables 4
              </p>
              <p class="text-xs text-grey-darkest">
                12:45 pm
              </p>
            </div>
            <p class="text-grey-dark mt-1 text-sm">
              Get Andrés on this movie ASAP!
            </p>
          </div>
        </div>
      </div>

    </div>
    <!-- Chat area -->
    <div class="sm:flex-1 p:2 sm:p-6 justify-between sm:flex flex-col max-h-[550px] min-h-[507px] hidden">
      <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
        <div class="relative flex items-center space-x-4">
          <div class="relative">
            <img
                src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                alt="" class="w-10 sm:w-10 h-10 sm:h-10 rounded-full">
          </div>
          <div class="flex flex-col leading-tight">
            <div class="text-2xl mt-1 flex items-center">
              <span class="text-gray-700 mr-3">Anderson Vanhron</span>
            </div>
          </div>
        </div>
      </div>
      <div id="messages"
           class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
        <div class="chat-message">
          <div class="flex items-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">Can be verified on any platform using docker</span>
              </div>
            </div>
            <img
                src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                alt="My profile" class="w-6 h-6 rounded-full order-1">
          </div>
        </div>
        <div class="chat-message">
          <div class="flex items-end justify-end">
            <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
              <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-[#003333] text-white ">Your error message says permission denied, npm global installs must be given root privileges.</span>
              </div>
            </div>
            <img
                src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                alt="My profile" class="w-6 h-6 rounded-full order-2">
          </div>
        </div>
      </div>
      <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
        <div class="relative flex">
          <input type="text" placeholder="Write your message!"
                 class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 bg-[#DDDDDD] rounded-3xl py-3 border-none">
          <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
            <button type="button"
                    class="inline-flex items-center justify-center rounded-3xl px-2 mr-2 py-2 transition duration-500 ease-in-out text-white bg-[#003333] hover:bg-blue-400 focus:outline-none">
              <span class="font-bold">Send</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                   class="h-6 w-6 ml-2 transform rotate-90">
                <path
                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>