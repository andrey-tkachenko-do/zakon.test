<script setup>
import BreezeAuthLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Search from "@/Components/Search.vue";


const props = defineProps({
    user: Object,
});

const form = useForm({
    searchString: '',
});

const submit = () => {
    form.get(route('search-documents'));
}

</script>

<template>
    <Head title="Search"/>

    <BreezeAuthLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Search
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Search @submit.prevent="submit" method="post" class="w-50" id="banner" v-model="form.searchString"></Search>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthLayout>
</template>
