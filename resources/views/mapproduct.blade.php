@extends('../layouts.app')

@section('title')
    CПИСОК ПРОДУКТОВ
@endsection

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <h3 style="
            text-align: center;
            ">СПИСОК ПРОДУКТОВ</h3>

            <table class="table table-borderd mb-5">

                <thead>
                    <th>
                    <th>id</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Цена</th>
                   

                </thead>
                <tbody>
                @foreach($product as $product)

                    <td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>

                    
                    </td>
                    </tr>
                    </th>
                @endforeach
                </tbody>
            </table>

            @if (session('startImportProducts'))
        <div class="alert alert-success">
            Загрузка продуктов запущена
        </div>
        @endif

    <form method="post" action="{{ route('importProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link" style="color:blue"><h5>Загрузить продукты</h5></button>
    </form>
        

<a href="/admin/pageuser" style="color:blue"><h4>СПИСОК ПОЛЬЗОВАТЕЛЕЙ</h4></a>
<br>
<a href="/admin/spisokсategory" style="color:blue"><h4>СПИСОК КАТЕГОРИЙ</h4></a>
@endsection
