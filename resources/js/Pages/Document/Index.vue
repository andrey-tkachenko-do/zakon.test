<script setup>
import BreezeAuthLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Search from "@/Components/Search.vue";

const props = defineProps({
    document: Object,
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
                        <h3 class="font-bold">{{document.title}}</h3>
                        <span class="whitespace-pre-line">{{document.body}}</span>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthLayout>
</template>

<style scoped>

</style>
