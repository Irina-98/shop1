@extends('layouts.app')
@section('style')
<style scoped>

    body {
    background: linear-gradient(30deg, grey, transparent);
    }

    .card {
        background: linear-gradient(20deg, blue, transparent);
    }
    
</style>
@endsection

@section('content')
<div class="container">
    <!--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: linear-gradient(20deg, blue, transparent);">
            <div class="card-header" style="
            color: aqua;
            text-align: center;
            "><h3>&laquo РЕГИСТРАЦИЯ &raquo</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end" style="
                                color: yellow;
                                text-align: center;
                                ">{{ __('ИМЯ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end" style="
                                color: yellow;
                                text-align: center;
                                ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" style="
                                color: yellow;
                                text-align: center;
                                ">{{ __('ПАРОЛЬ') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end" style="
                                color: yellow;
                                text-align: center;
                                ">{{ __('ПОДТВЕРДИТЕ ПАРОЛЬ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0" style="
                            text-align: -webkit-right;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="text-align: center">
                                    {{ __('ЗАРЕГИСТРИРОВАТЬСЯ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> перенести в RegisterComponent-->
    <register-component
    route-register="{{route('register')}}"
    ></register-component>
</div>
@endsection
