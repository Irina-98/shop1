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
        
        @if (session('startImportProducts'))
            <div class="alert alert-success">
                Загрузка продуктов запущена
            </div>
        @endif

        <form method="post" action="{{ route('importProducts') }}">
            @csrf
            <button type="submit" class="btn btn-link" style="color:blue"><h5>Загрузить продукты</h5></button>
        </form>

       

   
    <p>
    <a class="dropdown"style="color:darkblue" href="{{ route('categoryCreated') }}">
    <b></b>
    <h5>Добавить категорию&#10148;</h5></a>
    </p>

    <p>
    <a class="dropdown" style="color:darkblue" href="{{ route('productCreated') }}">
    <b></b>
    <h5>Добавить продукт&#10148;</h5></a>
    </p>
    <br>

    <a href="/admin/pageuser" style="color:blue"><h4>СПИСОК ПОЛЬЗОВАТЕЛЕЙ</h4></a>
    <br>
    <a href="/admin/spisokсategory" style="color:blue"><h4>СПИСОК КАТЕГОРИЙ</h4></a>
    <br>
    <a href="/admin/mapproduct" style="color:blue"><h4>СПИСОК ПРОДУКТОВ</h4></a>
@endsection
