<template>
    <Header></Header>
    <Container>
        <div class="text-center text-silver text-3xl font-bold">
            Tags
        </div>
        <div class="flex items-center mt-5 flex-row w-full flex-wrap mx-auto">
            <ul class="text-silver w-1/3 flex-col flex justify-center items-center" v-for="tag in tags_data">
                <li class="mb-2"><router-link :to="{name: 'sorted.tag.page', params: {slug: tag.title}}">{{tag.title}}</router-link></li>
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
const tags_data = ref([]);

api.get('/api/get_tags')
    .then(res => tags_data.value = res.data.data)
    .then(() => {
        groupedAndSortedArr.value = Object
            .values(tags_data.value.reduce((acc, n) => ((acc[n[0]] ??= []).push(n), acc), {}))
            .sort((a, b) => a[0][0].localeCompare(b[0][0]));
    })
    .then(()=>{  })
</script>
