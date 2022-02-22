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



    <form method="post" action="{{ route('importProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link">Загрузить продукты</button>
    </form>
        

<a href="/admin/pageuser">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
<br>
<a href="/admin/spisokсategory">СПИСОК КАТЕГОРИЙ</a>
@endsection
