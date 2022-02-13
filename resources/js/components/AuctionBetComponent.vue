<template>
    <div v-if="visible">
        <form :action="createRoute" method="POST">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="auction_id" :value="auctionId">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Цена
                </label>
                <input v-model="price" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="text" placeholder="100.00">
            </div>
            <div class="mb-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                    Описание
                </label>
                <textarea v-model="description" name="description" id="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" rows="5"></textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Сделать ставку
                </button>
            </div>
        </form>
        <div class="rounded-md drop-shadow-xl border border-cyan-500 mb-6">
            <div class="p-3 font-bold bg-cyan-500 rounded-md text-white">
                <h3>Новая ставка</h3>
                <div class="text-3xl">
                    {{ price }} ₽
                </div>
            </div>
            <div class="p-3 flex">
                <img :src="placeholder" class="w-1/3" alt="">
                <div class="w-2/3 m-3">
                    <div>
                        <dvi>
                            Продавец: <span class="font-bold">{{ sellerName }}</span>
                        </dvi>
                    </div>
                    <div >
                        <span class="font-bold"> Описание: </span>
                        <div class="max-h-36 overflow-auto">
                            {{ description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button @click="visible = true" v-if="!visible" type="button" class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Добавить новую
    </button>
</template>

<script>
export default {
    props: ['createRoute', 'sellerName', 'placeholder', 'sellerId', 'auctionId'],
    data () {
        return {
            visible: false,
            description: 'Расскажите об основных приемущества вашего товара',
            price: 300.00,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        show() {

        }
    }
}
</script>

<style scoped>

</style>
