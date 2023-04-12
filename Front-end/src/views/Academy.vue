<script setup>
import Search from "@/components/Search.vue";
import Consultants from "@/components/Consultants.vue";
import Articles from "@/components/Articles.vue";
import Question from "@/components/Question.vue";
import CTA from "@/components/CTA.vue";
import ForYou from "@/components/ForYou.vue";
</script>

<template>
  <main>
    <Search/>
    <ForYou/>
    <Consultants/>
    <Articles/>
    <Question/>
    <CTA/>
  </main>
</template>