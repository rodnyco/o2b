<template>
    <form :action="createRoute" @submit="checkForm" method="POST">
        <input type="hidden" name="_token" :value="csrf">
        <div class="mb-4 relative">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product">
                Товар для аукциона:
            </label>
            <input v-if="selected != null" type="hidden" name="product_id" :value="selected.id">
            <input name="product" type="text" v-model="keywords" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <ul class="absolute w-full" v-if="results.length > 0">
                <li v-on:click="select(result)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 cursor-pointer" v-for="result in results" :key="result.id" v-text="result.title">

                </li>
            </ul>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/2">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="count">
                    Количество
                </label>
                <input v-model="count" name="count" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="count" type="text" placeholder="">
            </div>
            <div class="w-full md:w-1/2 ml-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="unit">
                    Единица измерения
                </label>
                <input readonly v-if="selected != null" name="unit" v-model="selected.unit" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="unit" type="text" placeholder="">
                <input readonly v-else="selected != null" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="unit" type="text" placeholder="">
            </div>
        </div>
        <div class="mb-2">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                Требования к товару
            </label>
            <textarea v-model="description" name="description" id="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" rows="5"></textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Создать аукцион
            </button>
        </div>
    </form>

</template>

<script>
export default {
    props: ['createRoute'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            keywords: null,
            selected: null,
            count: 0,
            description: '',
            results: []
        };
    },

    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    methods: {
        fetch() {
            axios.get('/api/search', { params: { keywords: this.keywords } })
                .then(response => (this.results = response.data))
                .catch(error => {});
        },
        fetchCreate() {
            axios.post('/purchaser/auctions/create')
                .then(window.location.href = '/purchaser/auctions');
        },
        select(product) {
            this.selected = product;
            this.keywords = product.title + '(' + product.id + ')';
        }
    }
}
</script>

<style scoped>

</style>
