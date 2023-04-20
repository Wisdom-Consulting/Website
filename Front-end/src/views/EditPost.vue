<script setup>
import UpdatePost from "@/components/UpdatePost.vue";
</script>

<template>
    <Suspense>
        <template #default>
            <UpdatePost/>
        </template>
        <template #fallback>

        </template>
    </Suspense>
</template>