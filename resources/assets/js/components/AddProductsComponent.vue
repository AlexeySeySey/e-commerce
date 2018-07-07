<template>
    <h5 v-bind:class="hideElemeTets">{{hello}}</h5>
</template>

<script>
export default {
    data() {
        return {
            hello: 'SasS',
            hideElemeTets: {
                active: true,
                'opacity': 0
            }
        }

    },

    methods: {
        test() {
            document.getElementById('app').style.cssText = "opacity:0 !important;"
        }
    }
}
</script>

<style>
.hideElemeTets {
    opacity: 0;
}
</style>
