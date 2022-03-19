@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    
    <div class="container" style="background: linear-gradient(45deg, black, transparent);            
            ">
      @auth

    @endauth

    @guest
    <h5 style="
            color: springgreen;
            ">Пожалуйста, авторизуйтесь
    </h5>
    @endguest 

        @if ($showTitle)   

                </h1>
        @else
            Нет заголовка   
        @endif  
        
        <home-component source="blade_templade" :categories="{{$categories}}" ></home-component>
                
    <!--<div class="row">
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
        </div>-->
    </div>
@endsection
