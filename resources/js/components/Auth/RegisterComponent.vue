<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-md-center">РЕГИСТРАЦИЯ</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">ИМЯ</label>

                            <div class="col-md-6">
                                <input v-model="name" type="text" class="form-control" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">ПОЧТА</label>

                            <div class="col-md-6">
                                <input v-model="email" type="email" class="form-control" required autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">ПАРОЛЬ</label>

                            <div class="col-md-6">
                                <input v-model="password" type="password" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">ПОДТВЕРДИТЕ ПАРОЛЬ</label>

                            <div class="col-md-6">
                                <input v-model="password_confirmation" type="password" class="form-control" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary">
                                    ЗАРЕГИСТРИРОВАТЬСЯ
                                </button>
                            </div>
                        </div>
              
                </div>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    props: ['routeRegister'],
    data () {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        }
    },
    mounted () {
        console.log(this.routeRegister)
    }
}

</script>
