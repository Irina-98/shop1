<!--<template>
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
</script>-->



<template>
    <div>
        <div class="row">
            <div v-for="category in categories" :key="category.id" class="col-3">
                <a :href="'categories/' + category.id">
                    <div class="card mb-4" style="width: 18rem;">
                        <img :src="`/storage/img/categories/` + category.picture" width="290" height="215" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{category.name}}
                            </h5>
                            <p class="card-text">
                                {{ category.description }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories', 'source'],
        data () {
            return {

            }
        },
        mounted () {

        }
    }
</script>

<style scoped>

</style>


