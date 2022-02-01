<template>
    <div>component</div>
</template>

<script>
export default {
    data () {
        return {
            auctions: []
        }
    },
    created() {
        axios.get('/api/auctions')
            .then(response => {
                this.auctions = response.data;
            });
    },
}
</script>

<style scoped>

</style>
