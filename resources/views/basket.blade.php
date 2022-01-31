@extends('layouts.app')

@section('style')
    <style>
        .itogo {
            text-align: right;
        }
    </style>
@endsection

@section('content')
    <div class="container">

        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach

                    @if ($errors->has('email'))
                        Ссылка на <a href="{{route('login')}}">вход</a>
                    @endif
                </ul>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{$product['name']}}</td>                    
                        <td>{{$product['price']}}</td>                    
                        <td>{{$product['quantity']}}</td>                    
                        <td>{{$product['quantity'] * $product['price']}}</td>                    
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">
                            Опаньки, а корзина то что-то пуста. Айда пополнять))) <a href="{{route('home')}}">покупать!</a>
                        </td>
                    </tr>
                @endforelse
                @if ($products->count())
                <tr>
                    <td class="itogo" colspan=3>
                        Итого:
                    </td>
                    <td>
                        <strong>
                         {{ $products->map(function ($product) {
                                    return $product['price'] * $product['quantity'];
                        })->sum(); }}
                        </strong>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

        @if ($products->count())
        <form method="post" action="{{ route('createOrder') }}">
            @csrf
            <label>Имя</label>
            <input name='name' class="form-control mb-2" value="{{$name}}">

            <label>Адресс</label>
            <input name='address' class="form-control mb-2" value="{{$mainAddress->address ?? ''}}">

            <label>Почта</label>
            <input name='email' type='email' class="form-control mb-2" value="{{$email}}">

            <button class="btn btn-success">Оформить заказ</button>
        </form>
        @endif

    </div>

@endsection