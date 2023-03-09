<template>
 <Header></Header>
    <Container>
        <MainPagePayload :title="slug" :payload="payload">
        </MainPagePayload>
    </Container>
</template>

<script setup>
import Header from '../components/Header.vue'
import Container from '../components/Container.vue'
import MainPagePayload from '../components/MainPagePayload.vue'
import api from "../api.js";
import {ref, watch} from "vue";
import {useRoute} from "vue-router";
import router from "../router/index.js";
import { getCurrentInstance } from 'vue'
const instance = getCurrentInstance();

const route = useRoute();
const type = ref(route.meta.type);
const slug = ref(route.params.slug)

const payload = ref([]);
const startSearch = () => {
    api.post('/api/search', {
        'search': route.query.search
    }).then(res => payload.value = res.data.data)
};

if(type.value !== 'search'){
    api.post('/api/'+type.value+'/'+slug.value)
        .then(res => payload.value = res.data.data)
}
if(type.value === 'search'){
    startSearch();
}
watch(()=> route.query.search, (newValue, oldValue) => {
    startSearch();
})
</script>


