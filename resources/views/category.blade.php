@extends ('layouts.app')


@section('content')
<div class="container">
    <h3> ID категории: {{ $category->id }} </h3>
    <h3> Название категории: {{ $category->name }} </h3>

    <div class="row">
        @foreach ($category->products as $product)
        <div class="col-3 mb-4">
            <a href="/">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/img/products')}}/{{$product->picture}}" width="285" height="189" class="card-img-top" alt="{{$product->picture}}">
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
    </div>-->

</div>
    
@endsection

    
   
