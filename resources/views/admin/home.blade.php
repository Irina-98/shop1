@extends('../layouts.app')

@section('title')
    Админка
@endsection

@section('content')
    <div class="container">
        <table class="table table-borderd mb-5">
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{ route('enterAsUser', $user->id) }}">
                                Войти
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (session('startExportCategories'))
        <div class="alert alert-success">
            Выгрузка категорий запущена
        </div>
        @endif

        <form method="post" action="{{ route('exportCategories') }}">
            @csrf
            <button type="submit" class="btn btn-link">Выгрузить категории</button>
        </form>
        <form method="post" action="{{ route('exportProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link">Выгрузить продукты</button>
        </form>
    </div>

    @if (session('startImportCategories'))
        <div class="alert alert-success">
            Загрузка категорий запущена
        </div>
        @endif

        <form method="post" action="{{ route('importCategories') }}">
            @csrf
            <button type="submit" class="btn btn-link">Загрузить категории</button>
        </form>


        <form method="post" action="{{ route('importProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link">Загрузить продукты</button>
        </form>

    


    <a href="/admin/pageuser">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
    <br>
    <a href="/admin/spisokсategory">СПИСОК КАТЕГОРИЙ</a>
    <br>
    <a href="/admin/mapproduct">СПИСОК ПРОДУКТОВ</a>
@endsection
