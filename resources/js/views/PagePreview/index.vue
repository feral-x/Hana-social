<template>
    <Header></Header>
    <Container>
        <div class="flex md:flex-row flex-col text-silver py-8 px-2.5">

            <div class="rounded sm:w-1/2 w-full mx-auto">
                <img src="../../assets/img/cover.webp" alt="img" class="rounded sm:h-[494px] sm:w-[350px] w-[70%] object-cover mx-auto">
            </div>

            <div class="flex flex-col md:mt-0 mt-8 md:w-1/2 w-10/12 md:justify-center text-left md:mx-auto">
                <div class="font-bold text-silver text-xl">
                    kapahinasu(gasubaana)] hon ni siori wo hasan dara (Princess Connect! Re:Dive)[Chinese](blacksun30觉得下次应该是真琴然后是杏奈然后是栞最后是雪)
                </div>
                <div class="md:mt-0 mt-4 original-title text-silver text-lg font-light">
                    (C101) [マルカパヒナス (がすばあな)] 本にシオリを挟んだら (プリンセスコネクト!Re:Dive) [中国翻訳]
                </div>
                <div class="id md:mt-0 mt-4">
                    #<span>443300</span>
                </div>

                <div class="tags-box flex flex-col">
                    <div class="flex flex-col font-bold">
                        <div class="flex gap-1">Parodies: <span><a href="#" class="font-bold text-silver text-sm">Princess</a></span></div>
                        <div class="flex gap-1">Characters: <span><a href="#" class="font-bold text-silver text-sm">Princess</a></span></div>
                        <div class="flex gap-1">Tags: <span><a href="#" class="font-bold text-silver text-sm">Princess</a></span></div>
                        <div class="flex gap-1">Languages: <span><a href="#" class="font-bold text-silver text-sm">Princess</a></span></div>
                        <div class="flex gap-1">Categories: <span><a href="#" class="font-bold text-silver text-sm">Princess</a></span></div>
                        <div class="flex gap-1">Pages: <span><a href="#" class="font-bold text-silver text-sm">Princess</a></span></div>
                        <div class="flex gap-1">Uploaded: <span>Time</span></div>
                    </div>
                </div>

                <div class="flex gap-1 md:gap flex-wrap sm:mt-0 mt-6">
                    <button class="bg-danger text-silver font-bold max-w-fit p-1.5 px-2.5 rounded flex items-center gap-1 hover:bg-[#e00d3c] sm:mt-4 sm:h-auto h-11">
                        <svg class="h-6 w-6 text-silver"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" /></svg>
                        Favorites <span>(0)</span>
                    </button>
                    <button disabled class="bg-gray text-silver font-bold max-w-fit md:p-1.5 px-2.5 p-2.5 rounded flex items-center gap-1 sm:mt-4 sm:h-auto h-11">
                        <svg class="h-6 w-6 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <polyline points="8 12 12 16 16 12" />  <line x1="12" y1="8" x2="12" y2="16" /></svg>
                        Download
                    </button>
                </div>
            </div>

        </div>
    </Container>
    <Container>
        <MainPagePayload title="More Like This" :payload="payloadMore" />
    </Container>

    <Container>
        <main-page-payload title="Post a comments" type="input_comment">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-danger">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
            </svg>
        </main-page-payload>
    </Container>

    <container>
        <div class="flex flex-col">
            <!--    item    -->
            <div class="w-full flex text-left p-2 mb2.5">
                <img src="/assets/img/cover.webp" alt="img_user" class="rounded-full object-cover object-center w-[50px] h-[50px] overflow-hidden mr-2.5">
                <div class="flex flex-col flex-1 w-full">
                    <div class="flex w-full mb-2 items-center">
                        <div class="flex w-full">
                            <div class="font-bold text-silver text-sm">NAME</div> <div class="text-sm font-light text-silver opacity-75 ml-2">time</div>
                        </div>
                        <div class="w-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="silver" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-silver">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                        </div>
                    </div>
                    <div class="text-silver text-sm">some comments</div>
                </div>
            </div>

        </div>
    </container>


</template>

<script setup>

import Header from '../../components/Header.vue'
import Container from '../../components/Container.vue'
import MainPagePayload from '../../components/MainPagePayload.vue'
import {reactive} from "vue";

const payloadMore = reactive([
    {
        'id': 1,
        'url': '../assets/img/cover.webp',
        'title': '[STUDIO HUAN (Raidon)] Jimoto no Hame Tomo. "Shinya no Conveni Tenin A" | My Hometown Fuck Buddy. Midnight Shift Store Clerk A\'s Case [English] [Team Rabu2]'
    },
    {
        'id': 2,
        'url': '../assets/img/thumb.webp',
        'title': '[STUDIO HUAN (Raidon)] [Niziyumedokoro (Yakuhina)] PRINCESS SHADOW 2 (Princess Connect! Re:Dive) [Digital]'
    },
    {
        'id': 3,
        'url': '../assets/img/thumb.webp',
        'title': '(PriConne Daihyakka 12) [Ryuukakusan Nodoame (Gokubuto Mayuge)] Shiori no Ecchi na Hi (Princess Connect! Re:Dive)'
    },
    {
        'id': 3,
        'url': '../assets/img/thumb.webp',
        'title': '(PriConne Daihyakka 12) [Ryuukakusan Nodoame (Gokubuto Mayuge)] Shiori no Ecchi na Hi (Princess Connect! Re:Dive)'
    },
    {
        'id': 3,
        'url': '../assets/img/thumb.webp',
        'title': '(PriConne Daihyakka 12) [Ryuukakusan Nodoame (Gokubuto Mayuge)] Shiori no Ecchi na Hi (Princess Connect! Re:Dive)'
    },
])
</script>

