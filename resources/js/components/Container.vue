<template>
    <div class="container max-w-[1200px] mx-auto bg-primary rounded p-2.5 mt-2.5">
        <slot />
    </div>
</template>

<script setup>
const props = defineProps(['title'])
console.log(props)
</script>
