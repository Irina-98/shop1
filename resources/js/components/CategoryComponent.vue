<template>
    <div>
        <div class="row">
            <template v-if="loading">

                            <button
                                v-if="product.quantity > 0"
                                @click="basket(product.id, 'remove', product.quantity)"
                                :disabled="product.quantity == 0"
                                class="btn btn-danger">
                                -
                            </button>
                            <button
                                v-else
                                :disabled="product.quantity == 0"
                                class="btn btn-danger">
                                -

    </div>
</template>

<script>

</script>

<style scoped>



a:active,
a:hover,
a {
    text-decoration: none;
    color: black;
}

.card:hover {
    box-shadow: 0.4em 0.4em 5px rgb(122 122 122 / 50%);
}

.card-basket-buttons {
    display: flex;
    justify-content: space-between;
}

.card-basket-quantity {
    line-height: 34px;
}

.card-price {
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
    border-bottom: 2px solid gray;
}

.card-text {
    height: 70px;
}

.card-title {
    height: 45px;
    text-align: center;
    font-weight: bold;
}

</style>
>>>>>>> origin/master
