<template>
    <Preloader v-if="loading"></Preloader>
    <div v-else>
        <Header></Header>
        <div>
            <div class="bg-gray w-full flex items-center">
                <div class="float-left ml-5 px-1 cursor-pointer hover:bg-hover h-10 flex items-center" @click="toTitle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                </div>
                <div class="flex items-center justify-center h-10 mx-auto">

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="toStart">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                        </svg>
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="prev_page" v-if="cur_page >= 2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover px-1.5 text-silver">
                        {{ (cur_page) + ' of ' + page_data.value.pages.length}}
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="next_page" v-if="cur_page < page_data.value.pages.length">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="toEnd">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>

        <div class="flex w-full justify-center m-h-[300px] max-h-screen z-50">
                <img :src="'/'+page_data.value.pages[cur_page -1].url" alt="page" class="object-contain cursor-pointer" @click="next_page">
        </div>

        <div>
            <div class="bg-gray w-full flex items-center">
                <div class="float-left ml-5 px-1 cursor-pointer hover:bg-hover h-10 flex items-center" @click="toTitle">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                    </svg>
                </div>
                <div class="flex items-center justify-center h-10 mx-auto">

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="toStart">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                        </svg>
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="prev_page" v-if="cur_page >= 2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover px-1.5 text-silver">
                        {{ (cur_page) + ' of ' + page_data.value.pages.length}}
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="next_page" v-if="cur_page < page_data.value.pages.length">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>

                    <div class="cursor-pointer h-full flex items-center hover:bg-hover" @click="toEnd">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                        </svg>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
import Header from '../components/Header.vue'
import Preloader from '../components/Preloader.vue'
import api from "../api.js";
import {reactive, ref} from "vue";
import {useRoute, useRouter} from "vue-router";

let loading = ref(true);

const route = useRoute();
const router = useRouter();
const book_id = route.params.book_id;
const cur_page = ref(route.params.page_id);
const page_data = reactive([]);

api.get('/api/book/'+book_id)
    .then(res => page_data.value = res.data.data.book)
    .then(() => {
        if(cur_page.value > page_data.value.pages.length){
            router.push({name: '404'})
        }
    })
    .then(() => loading.value = false)
    .catch(e => {
        if (e.response.status === 404){
            router.push({name: '404'})
        }
    })

const next_page = () => {
    if (+page_data.value.pages.length === +cur_page.value){
        router.push({name: 'title.page', params: {id: book_id}})
    } else {
        console.log(page_data.value.pages.length)
        console.log(cur_page.value)
        cur_page.value++
        router.replace({name: 'read.page', params: {book_id: book_id, page_id: cur_page.value}})
    }
}

const prev_page = () => {
    cur_page.value--;
    router.replace({name: 'read.page', params: {book_id: book_id, page_id: cur_page.value}})
}

const toEnd = () => {
    cur_page.value = page_data.value.pages.length;
    router.replace({name: 'read.page', params: {book_id: book_id, page_id: cur_page.value}})
}

const toStart = () => {
    cur_page.value = 1;
    router.replace({name: 'read.page', params: {book_id: book_id, page_id: cur_page.value}})
}


const toTitle = () => {
    router.push({name: 'title.page', params: {id: book_id}})
}
</script>

<style>
.h-calc {
}
</style>
