@extends ('layouts.app')

@section('style')
    <style>
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
            font-size: 20px;
            margin-top: 10px;
            text-align: center;
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
@endsection

@section('content')
<div class="container">
    <h3> ID категории: {{ $category->id }} </h3>
    <h3> Название категории: {{ $category->name }} </h3>

    <div class="row">
        @foreach ($category->products as $product)
        <div class="col-3 mb-4">
            <a href="/">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/img/products')}}/{{$product->picture}}" class="card-img-top" alt="{{$product->picture}}">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$product->name}}
                            </h5>
                                <p class="card-text">
                                    {{ substr($product->description, 0, 90) }}...
                                </p>
                                <div class="card-basket-buttons">
                                    <form method="post" action="{{ route('removeProduct') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button class="btn btn-danger">-</button>
                                    </form>
                                    <div class="card-basket-quantity">
                                        {{ session("products.{$product->id}") }}    
                                    </div>
                                        <form method="post" action="{{ route('addProduct') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-success">+</button>
                                        </form>
                                    </div>
                            
                                    <div class="card-price">
                                        {{$product->price}} руб.
                                </div>
                        </div>
                </div>
            </a>    
        </div>           
        @endforeach
    </div> 
</div>
    
@endsection
