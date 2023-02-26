<template>
    <Header></Header>
    <Container>
        <div class="flex md:flex-row flex-col text-silver py-8 px-2.5">

            <div class="rounded w-1/2 mx-auto">
                <img src="../../assets/img/cover.webp" alt="img" class="rounded h-[494px] w-[350px] object-cover mx-auto">
            </div>

            <div class="flex flex-col w-1/2 justify-center text-left mx-auto">
                <div class="translate-title font-bold text-silver text-xl">
                    kapahinasu(gasubaana)] hon ni siori wo hasan dara (Princess Connect! Re:Dive)[Chinese](blacksun30觉得下次应该是真琴然后是杏奈然后是栞最后是雪)
                </div>
                <div class="original-title text-silver text-lg font-light">
                    (C101) [マルカパヒナス (がすばあな)] 本にシオリを挟んだら (プリンセスコネクト!Re:Dive) [中国翻訳]
                </div>
                <div class="id">
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

                <div class="flex gap-2">
                    <button class="bg-danger text-silver font-bold max-w-fit p-1.5 px-2.5 rounded flex items-center gap-1 hover:bg-[#e00d3c] mt-8">
                        <svg class="h-6 w-6 text-silver"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M12 20l-7 -7a4 4 0 0 1 6.5 -6a.9 .9 0 0 0 1 0a4 4 0 0 1 6.5 6l-7 7" /></svg>
                        Favorites
                    </button>
                    <button disabled class="bg-gray text-silver font-bold max-w-fit p-1.5 px-2.5 rounded flex items-center gap-1 mt-8">
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
</template>

<script setup>

import Header from '../../components/Header.vue'
import Container from '../../components/Container.vue'
import MainPagePayload from '../../components/MainPagePayload.vue'
import {reactive} from "vue";

const payloadMore = reactive([
    {
        'id': 1,
        'url': 'assets/img/cover.webp',
        'title': '[STUDIO HUAN (Raidon)] Jimoto no Hame Tomo. "Shinya no Conveni Tenin A" | My Hometown Fuck Buddy. Midnight Shift Store Clerk A\'s Case [English] [Team Rabu2]'
    },
    {
        'id': 2,
        'url': 'assets/img/thumb.webp',
        'title': '[STUDIO HUAN (Raidon)] [Niziyumedokoro (Yakuhina)] PRINCESS SHADOW 2 (Princess Connect! Re:Dive) [Digital]'
    },
    {
        'id': 3,
        'url': 'assets/img/thumb.webp',
        'title': '(PriConne Daihyakka 12) [Ryuukakusan Nodoame (Gokubuto Mayuge)] Shiori no Ecchi na Hi (Princess Connect! Re:Dive)'
    },
    {
        'id': 3,
        'url': 'assets/img/thumb.webp',
        'title': '(PriConne Daihyakka 12) [Ryuukakusan Nodoame (Gokubuto Mayuge)] Shiori no Ecchi na Hi (Princess Connect! Re:Dive)'
    },
    {
        'id': 3,
        'url': 'assets/img/thumb.webp',
        'title': '(PriConne Daihyakka 12) [Ryuukakusan Nodoame (Gokubuto Mayuge)] Shiori no Ecchi na Hi (Princess Connect! Re:Dive)'
    },
])
</script>

