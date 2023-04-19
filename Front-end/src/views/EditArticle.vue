<script setup>
import UpdateArticle from "@/components/UpdateArticle.vue";
</script>

<template>
  <Suspense>
    <template #default>
      <UpdateArticle/>
    </template>
      <template #fallback>

      </template>
  </Suspense>
</template>