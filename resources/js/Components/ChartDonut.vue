<template lang="">
    <div>
        <div id="chart">
            <apexchart
                type="donut"
                height="300"
                :options="options"
                :series="series"
            ></apexchart>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        options: Object,
        series: Object,
    },
};
</script>
<style lang=""></style>
