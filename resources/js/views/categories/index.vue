<template>
    <Header></Header>
    <Container>
        <div class="text-center text-silver text-3xl font-bold">
            Categories
        </div>
        <div class="flex items-center mt-5 flex-row w-full flex-wrap mx-auto">
            <ul class="text-silver w-1/3 flex-col flex justify-center items-center" v-for="category in categories_data">
                <li class="mb-2"><router-link :to="{name: 'sorted.category.page', params: {slug: category.title}}">{{category.title}}</router-link></li>
            </ul>
        </div>
    </Container>
</template>

<script setup>
import api from "../../api.js";
import Container from '../../components/Container.vue';
import Header from '../../components/Header.vue';
import {ref} from "vue";


const groupedAndSortedArr = ref([]);
const categories_data = ref([]);

api.get('/api/get_categories')
    .then(res => categories_data.value = res.data.data)
    .then(() => {
        groupedAndSortedArr.value = Object
            .values(categories_data.value.reduce((acc, n) => ((acc[n[0]] ??= []).push(n), acc), {}))
            .sort((a, b) => a[0][0].localeCompare(b[0][0]));
    })
    .then(()=>{  })
</script>
