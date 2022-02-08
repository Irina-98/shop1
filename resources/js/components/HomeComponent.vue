<template>
     <div>
       <h1>СПИСОК КАТЕГОРИЙ</h1>
       <button @click="clickCounter" class="btn btn-primary">CLICK {{ counter }}</button>

         <span v-if="showText">
             Текст
         </span>

     </div>
</template>

<script>
    export default {
        data () {
            return {
                categories: [],
                counter: 0,
                showText: false
            }
        },
        methods: {
            clickCounter () {
               this.counter++
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
