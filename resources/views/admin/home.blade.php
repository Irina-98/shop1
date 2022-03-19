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
            Выгружаем категории
            <!--<div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> запуск спиннера-->
            
        </div>
        @endif

        <form method="post" action="{{ route('exportCategories') }}">
            @csrf
            <button type="submit" class="btn btn-link" style="color:blue"><h5>Выгрузить категории</h5></button>
        </form>
        
        @if (session('startExportProducts'))
        <div class="alert alert-success">
            Выгрузка продуктов запущена
        </div>
        @endif

        <form method="post" action="{{ route('exportProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link" style="color:blue"><h5>Выгрузить продукты</h5></button>
        </form>
    </div>

        @if (session('startImportCategories'))
            <div class="alert alert-success">
                Загрузка категорий запущена
            </div>
        @endif

        <form method="post" action="{{ route('importCategories') }}">
            @csrf
            <button type="submit" class="btn btn-link" style="color:blue"><h5>Загрузить категории</h5></button>
        </form>

    </div>


    <a href="/admin/pageuser">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>

    <br>

    <a href="/admin/pageuser" style="color:blue"><h4>СПИСОК ПОЛЬЗОВАТЕЛЕЙ</h4></a>
    <br>

@endsection
