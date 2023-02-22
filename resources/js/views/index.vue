<template>
    <Header />
    <h1 class="text-2xl">HANA</h1>
</template>

<script setup>
import Header from '../components/Header.vue'
import {useRoute, useRouter} from "vue-router";
const router = useRouter();
const route = useRoute();


console.log(router);
</script>

