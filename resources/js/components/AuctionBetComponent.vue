<template>
    <form action="">
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
</template>

<script>
export default {
    props: ['createRoute', 'sellerName', 'placeholder', 'sellerId'],
    data () {
        return {
            description: 'Расскажите об основных приемущества вашего товара',
            price: 300.00
        }
    },
}
</script>

<style scoped>

</style>
