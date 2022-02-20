@extends('../layouts.app')

@section('title')
    CПИСОК ПРОДУКТОВ
@endsection

@section('content')


    <form method="post" action="{{ route('importProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link">Загрузить продукты</button>
    </form>
        

<a href="/admin/pageuser">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
<br>
<a href="/admin/spisokсategory">СПИСОК КАТЕГОРИЙ</a>
@endsection
