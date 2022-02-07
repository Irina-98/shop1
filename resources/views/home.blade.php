@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

<home-component></home-component>
    
    <div class="container">
      @auth
        Вы это читаете, потому что вы авторизованы
    @endauth

    @guest
        Пожалуйста, авторизуйтесь
    @endguest 

        @if ($showTitle)   
            <h1>{{$title}}</h1>
        @else
            Нет заголовка   
        @endif                  
                
    <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-3 mb-4">
                        <div class="card" style="width: 18rem; text-align: center">
                            <img src="{{asset('storage/img/categories')}}/{{$category->picture}}"  width="285" height="189" class="card-img-top" alt="{{$category->picture}}">
                            <div class="card-body">
                                <h5 class="card-title">
                                {{$category->name}} ({{$category->products->count()}})
                                </h5>
                                <p class="card-text">
                                    {{$category->description}}
                                </p>
                                <a href="{{route('category', $category->id)}}" class="btn btn-info">Перейти</a>
                            </div>
                        </div>
                    </div>
                @endforeach             
        </div>
    </div>
@endsection
