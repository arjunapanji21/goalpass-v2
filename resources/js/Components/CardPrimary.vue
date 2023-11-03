<template lang="">
    <div>
        <div class="card w-full bg-primary text-primary-content">
            <div class="card-body">
                <h2 class="card-title" :v-html="title"></h2>
                <div class="text-4xl" :v-html="body"></div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        title: String,
        body: String,
    },
};
</script>
<style lang=""></style>
