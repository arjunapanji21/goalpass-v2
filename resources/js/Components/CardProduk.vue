<template lang="">
    <div>
        <div class="bg-base-100 m-2 relative rounded-box">
            <figure>
                <img
                    :src="img"
                    alt="foto-produk.jpeg"
                    class="object-cover w-full h-40 rounded-box"
                />
            </figure>
            <div
                class="bg-base-100 text-base-content w-full rounded-b-box p-2 truncate absolute bottom-0 z-1"
            >
                {{ title }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        img: String,
        title: String,
    },
};
</script>
<style lang=""></style>
