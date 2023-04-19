<script setup>

</script>

<template>
  <Suspense>
    <template #default>
        <editQuiz/>
    </template>
    <template #fallback>
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </template>
  </Suspense>
</template>

