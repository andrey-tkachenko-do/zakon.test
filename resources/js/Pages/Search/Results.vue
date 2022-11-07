<script setup>
import BreezeAuthLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Search from "@/Components/Search.vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    result: Object,
    exTime: Number,
    searchString: String,
});

const form = useForm({
    searchString: '',
});


</script>

<template>
    <BreezeAuthLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Search result
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 mb-2">
                        <div class="p-6 bg-white border border-gray-200 rounded">
                            <Search @submit.prevent="submit" :defaultText="searchString" method="post" class="w-50" id="banner" v-model="form.searchString"></Search>
                            <span class="grid grid-cols-2 place-content-between">
                                <span>Execution Time: {{exTime.toString().substring(0, 5)}}... s.</span>
                                <span class="text-right">Total: {{result.total}}</span></span>
                        </div>
                        <Pagination :data="result" class="mb-5"/>
                        <div v-if="result.hits" v-for="document in result.hits" class="p-6 bg-white border border-gray-200 rounded">
                            <a :href="route('document.show', {document: document.id})"><h3 class="font-bold">{{document.title}}</h3></a>
                            <p>{{document.body.substring(0, 150)}}...</p>
                        </div>
                        <Pagination :data="result"/>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthLayout>
</template>

<script>
export default {
    methods: {
        submit() {
            this.form.get(route('search-documents'));
        },
        functionName() {},
    }
}
</script>
