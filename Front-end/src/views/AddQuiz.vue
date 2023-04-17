<script setup>
import addQuiz from '../components/addQuiz.vue'
</script>

<template>
  <Suspense>
    <template #default>
        <addQuiz/>
    </template>
    <template #fallback>
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </template>
  </Suspense>
</template>

