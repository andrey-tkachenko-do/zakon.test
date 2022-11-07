<template>
    <div class="flex flex-wrap -mb-1 mt-4">
        <a v-if="parseInt(data.page) !== 1"
           :href="route(route().current())+'?'+'searchString='+this.$inertia.page.props.searchString+'&'+'perPage='+data.perPage+'&'+'page='+(parseInt(data.page)-1)"
           class="border mr-2 p-2"
        >Prev</a>
        <a v-if="parseInt(data.page) !== data.totalPages"
           :href="route(route().current())+'?'+'searchString='+this.$inertia.page.props.searchString+'&'+'perPage='+data.perPage+'&'+'page='+(parseInt(data.page)+1)"
           class="border mr-2 p-2"
        >Next</a>
    </div>
</template>
<script>
export default {
    props: {
        data: Object
    },
}
</script>
