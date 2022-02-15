<template>
    <li class="nav-item">
        <a class="nav-link" href="/">
            Корзина ({{ quantity }})
        </a>
    </li>
</template>

<script>
export default {
    computed: {
        quantity () {
            return this.$store.state.basketProductsQuantity
        }
    }
}
</script>
