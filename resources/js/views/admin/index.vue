<template>
    <div class="max-w-[1200px] pt-0 mt-0 min-h-screen mx-auto bg-primary">
        <div class="flex w-full justify-between px-5 text-silver py-10">
            <div class="flex justify-center mr-4 w-2/5">
                <div class="mb-3 w-96">
                    <label class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Preview</label>
                    <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent" type="file" id="formFile" @change="show"/>
                    <div v-if="preview_img && preview_img.length > 0" class="rounded max-w-[400px] w-full mt-4">
                        <img :src="preview_img" alt="" class="rounded">
                    </div>
                </div>
            </div>
            <div class="text-silver flex-1 flex flex-col items-center justify-center">
                <label>Title</label>
                <input type="text" class="input rounded mb-4 w-full" v-model="title">

                <label>Original title</label>
                <input type="text" class="input rounded mb-4 w-full" v-model="original_title">


                <label>Create new tag</label>
                <input type="text" class="input rounded mb-4 w-full" @keydown.enter="addTag" v-model="tagInput">


                <label>Create new category</label>
                <input type="text" class="input rounded mb-4 w-full" @keydown.enter="addCategory" v-model="categoryInput">

                <label class="mb-2"> Tags list:</label>
                <select class="flex form-multiselect flex-wrap sm:w-2/3 w-full rounded p-2 text-center" :class="{'bg-gray': tagBox.length > 0}" multiple v-model="selectedTags">
                        <option class="cursor-pointer hover:bg-hover" v-for="item in tagBox" :value="item.id">{{item.title}}</option>
                </select>


                <label class="mb-2 mt-5"> Categories list:</label>
                <select class="flex form-multiselect flex-wrap sm:w-2/3 w-full rounded p-2 text-center" :class="{'bg-gray': tagBox.length > 0}" multiple v-model="selectedCategories">
                    <option class="cursor-pointer hover:bg-hover" v-for="item in categoryBox" :value="item.id">{{item.title}}</option>
                </select>

            </div>
        </div>
        <div class="border-t border-silver pt-5 pb-20 text-silver flex justify-center flex-col">
            <div class="text-silver text-center">
                Add pages
            </div>
            <input multiple class="relative m-0 block w-1/3 mx-auto mt-5 min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent" type="file" @change="showPages"/>
            <div class="w-full py-5 flex flex-wrap">
                <div v-if="pagePrevBox && pagePrevBox.length > 0" class="rounded sm:w-1/5 w-1/3 p-1.5 w-full mt-4" v-for="img in pagePrevBox">
                    <img :src="img" alt="img" class="rounded">
                </div>
            </div>
            <div class="flex justify-center items-center border-t border-silver">
                <button class="bg-danger px-8 py-1.5 rounded mt-5" @click="submitData">Save</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import {ref} from "vue";
import api from "../../api.js";
import {useRouter} from "vue-router";

const router = useRouter();

const preview_img = ref([]);
const preview = ref([]);

const title = ref('');
const original_title = ref('');


const tagInput = ref('');
const tagBox = ref([]);
const selectedTags = ref([]);

const categoryInput = ref('');
const categoryBox = ref([]);
const selectedCategories = ref([]);


const pagePrevBox = ref([]);
const pagesBox = ref([]);


const loadTags = () => {
    api.get('/api/guardian/get_tags')
        .then(res => tagBox.value = res.data.data)
}
loadTags();
const loadCategories = () => {
    api.get('/api/guardian/get_categories')
        .then(res => categoryBox.value = res.data.data)
}
loadCategories();

const addTag = () => {
    api.post('/api/guardian/create_tag', {
        'tag': tagInput.value
    }).then(() => {
        tagInput.value = '';
        loadTags();
    }).catch(e => console.log(e))
}
const addCategory = () => {
    api.post('/api/guardian/create_category', {
        'category': categoryInput.value
    }).then(() => {
        categoryInput.value = '';
        loadCategories();
    }).catch(e => console.log(e))
}
const show = (e) => {
    preview_img.value = [];
    let array = Array.from(e.target.files);
    preview.value = e.target.files
    array.forEach((item)=>{
        preview_img.value = URL.createObjectURL(item)
    })
}
const showPages = (e) => {
    pagePrevBox.value = [];
    pagesBox.value = [];
    pagesBox.value = e.target.files;
    let array = Array.from(e.target.files);
    array.forEach((item)=>{
        pagePrevBox.value.push(URL.createObjectURL(item))
    })
}

const submitData = () => {
    if (preview.value.length === 0 && tagBox.value.length === 0 && pagesBox.value.length === 0 && title.value.length === 0 && original_title.value.length === 0) {
        alert('Заполните все поля! / Fill in all the fields!')
    } else {
        api.post('/api/guardian/create', {
            'title': title.value,
            'original_title': original_title.value,
            'pages': pagesBox.value,
            'prev_img': preview.value,
            'tags': selectedTags.value,
            'categories': selectedCategories.value,
        }, {
            headers: {
                'Content-Type': "multipart/form-data"
            }
        })
            .then(() => {
                location.reload()
            })
    }
}
</script>
