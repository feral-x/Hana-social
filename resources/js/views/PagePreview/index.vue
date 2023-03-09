<template>
    <Preloader v-if="loading"></Preloader>
    <div v-else>
        <Header></Header>
        <Container>
            <div class="flex md:flex-row flex-col text-silver py-8 px-2.5" v-if="page_data.value">

                <div class="rounded sm:w-1/2 w-full mx-auto">
                    <img :src="'../'+page_data.value.preview_img" alt="img" class="rounded sm:h-[494px] sm:w-[350px] w-[70%] object-cover mx-auto">
                </div>

                <div class="flex flex-col md:mt-0 mt-8 md:w-1/2 w-10/12 md:justify-center text-left md:mx-auto">
                    <div class="font-bold text-silver text-xl">
                        {{page_data.value.title}}
                    </div>
                    <div class="md:mt-0 mt-4 original-title text-silver text-lg font-light" v-if="page_data.value.original_title">
                        {{page_data.value.original_title}}
                    </div>
                    <div class="id md:mt-0 mt-4">
                        #<span>{{page_data.value.id}}</span>
                    </div>

                    <div class="tags-box flex flex-col">
                        <div class="flex flex-col font-bold">
                            <div class="flex gap-1 items-center">Tags:
                                <router-link :to="{name: 'sorted.tag.page', params: {slug: tag.title}}" v-for="tag in page_data.value.tags" class="hover:opacity-75"><span class="bg-gray py-0.5 px-1 rounded-l font-bold text-silver text-sm">{{tag.title}}</span><span class="rounded-r text-sm font-light bg-[#333] py-0.5 px-1">{{tag.count}}</span></router-link>
                            </div>
                            <div class="flex gap-1 items-center">Categories:
                                <router-link :to="{name: 'sorted.category.page', params: {slug: category.title}}" v-for="category in page_data.value.categories" class="hover:opacity-75"><span class="bg-gray py-0.5 px-1 rounded-l font-bold text-silver text-sm">{{category.title}}</span><span class="rounded-r text-sm font-light bg-[#333] py-0.5 px-1"> {{category.count}}</span></router-link>
                            </div>
                            <div class="flex gap-1 items-center" v-if="page_data.value.pages">Pages:
                                <a href="#" class="hover:opacity-75"><span class="bg-gray py-0.5 px-1 rounded font-bold text-silver text-sm">{{page_data.value.pages.length}}</span></a>
                            </div>
                            <div class="flex gap-1 items-center">Uploaded: <span class="font-light text-sm">{{ page_data.value.created_at ? new Date(page_data.value.created_at).toLocaleDateString() : 'No data' }}</span></div>
                        </div>
                    </div>

                    <div class="flex gap-1 md:gap flex-wrap sm:mt-0 mt-6">
                        <button class="bg-danger text-silver font-bold max-w-fit p-1.5 px-2.5 rounded flex items-center gap-1 hover:bg-[#e00d3c] sm:mt-4 sm:h-auto h-11" @click="postLike">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-silver" :class="{'fill-white': is_me, 'fill-none' : !is_me }">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            {{is_me ? 'Liked!' : 'Favorites'}}  <span>({{loadCount}})</span>
                        </button>
                        <button disabled class="bg-gray text-silver font-bold max-w-fit md:p-1.5 px-2.5 p-2.5 rounded flex items-center gap-1 sm:mt-4 sm:h-auto h-11">
                            <svg class="h-6 w-6 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <polyline points="8 12 12 16 16 12" />  <line x1="12" y1="8" x2="12" y2="16" /></svg>
                            Download
                        </button>
                    </div>
                </div>

            </div>
        </Container>
<!--  content  -->
        <container class="mt-8">
            <div class="flex flex-wrap justify-center mb-4 relative pb-10 mt-10" v-if="page_data.value.pages">
                <div class="card rounded bg-gray lg:w-[19%] md:w-[24%] sm:w-[32%] w-[48%] h-[50%] m-1 cursor-pointer group relative inline-block" v-for="(page, idx) in page_data.value.pages"
                     @click="router.push('/g/'+page.book_id+'/'+(idx+1))">
                    <img :src="'../'+page.url" alt="page" class="rounded object-cover h-[50%]">
                </div>
            </div>
        </container>


        <Container>
            <MainPagePayload title="More Like This" :payload="payloadMore" />
        </Container>

        <Container>
            <main-page-payload title="Post a comments" type="input_comment">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-danger">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                </svg>
            </main-page-payload>
            <InputComment @update="loadComments"></InputComment>
        </Container>

        <container>
            <div class="flex flex-col">
                <!--    item    -->
                <div class="w-full flex text-left p-2 hover:bg-gray hover:rounded" v-if="comments_data.value && comments_data.value.length > 0" v-for="comment in comments_data.value">
                    <div class="rounded-full object-cover object-center w-[50px] h-[50px] overflow-hidden mr-2.5">
                        <img :src="'/'+comment.user.avatar" alt="img_user">
                    </div>

                    <div class="flex flex-col flex-1 w-full">
                        <div class="flex w-full items-center">
                            <div class="flex w-full">
                                <div class="font-bold text-silver text-sm">{{comment.user.name}}</div> <div class="text-sm font-light text-silver opacity-75 ml-2">{{comment.created_at ? new Date(comment.created_at).toLocaleDateString() : 'Нет даты'}}</div>
                            </div>
                            <div class="w-2.5 mr-1.5">
                                <div v-if="my_id === comment.user.id || my_id === 1" class="cursor-pointer hover:opacity-75" @click="deleteHandler(comment.user.id, comment.id)">
                                    <svg class="w-4 h-4 text-danger cursor-pointer"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z" />  <line x1="18" y1="9" x2="12" y2="15" />  <line x1="12" y1="9" x2="18" y2="15" /></svg>
                                </div>
                                <div v-else>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="silver" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-silver">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="text-silver text-sm flex flex-wrap h-auto break-all">{{comment.body}}</div>
                    </div>
                </div>
                <div class="text-silver font-light text-2xl text-center" v-else> Still no comments..</div>
            </div>
        </container>
    </div>


</template>

<script setup>
import {useRoute, useRouter} from "vue-router";
import Header from '../../components/Header.vue'
import Preloader from '../../components/Preloader.vue'
import Container from '../../components/Container.vue'
import MainPagePayload from '../../components/MainPagePayload.vue'
import {defineEmits, reactive, ref, watch} from "vue";
import api from "../../api.js";
import InputComment from '../../components/InputComment.vue'
import {useStore} from "vuex";


let loading = ref(true);
const route = useRoute();
const router = useRouter();
const payloadMore = reactive(null);
const id = ref(route.params.id);
const page_data = reactive([]);
const comments_data = reactive([]);
const upload_data = ref(0);
const store = useStore();
let d = new Date();
const emit = defineEmits();
const my_id = ref(0);
const loadCount = ref(0);
const is_me = ref(0);
watch(() => route.params.id, (currentValue, oldValue) => {
    router.go()
})

api.get('/api/book/'+id.value)
    .then(res => page_data.value = res.data.data.book)
    .then(()=> loading.value = false)
    .catch(e => {
        if (e.response.status === 404){
            router.push({name: '404'})
        }
    })
const loadComments = () => {
    api.get('/api/book/'+id.value+'/comments')
        .then(res => comments_data.value = res.data.data)
        .catch(e => console.log(e));
}
const deleteHandler = (user_id, comment_id) => {
    api.delete('/api/book/'+id.value+'/comments', {
         data: {
           'comment_id': comment_id,
             'user_id': user_id
         }
    })
    .then(res => console.log(res))
        .then(() => loadComments())
    .catch(e => console.log(e))
}

const postLike = () => {
    api.post('/api/likes', {
        'book_id': id.value
    }).then(()=> {
        loadLikes();
    })
}

const loadLikes = () => {
    api.post('/api/get_likes', {
        'book_id': id.value
    })
        .then(res => {
            loadCount.value = res.data.count;
            is_me.value = res.data.is_you;
        })
}
loadLikes();

if(store.state.isLogin){
    api.post('/api/users/me')
        .then((res)=> my_id.value = res.data)
}
loadComments();

</script>

