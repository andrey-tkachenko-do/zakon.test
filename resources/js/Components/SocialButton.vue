<script>
import Button from "@/Components/Button.vue";

export default {
    name: "SocialLoginButton",
    components: {Button},
    props: {
        social: String,
        img_name: String,
        btn_text: String
    },
};

</script>

<template>
    <div class="row mb-0 mt-3">
        <a :href="route('social.redirect', {'provider': social})">
            <Button class="w-full">
                <img class="w-5 m-0" :src="'/storage/images/layout/social/' + img_name" alt/>
                <p class="ml-3">{{ btn_text }}</p>
            </Button>
        </a>
    </div>
</template>
