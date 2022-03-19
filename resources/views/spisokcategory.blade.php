@extends('../layouts.app')

@section('title')
    CПИСОК КАТЕГОРИЙ
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
        <h3 style="
            text-align: center;
        ">СПИСОК КАТЕГОРИЙ</h3>

            <table class="table table-borderd mb-5">

                <thead>
                    <th>
                    <th>id</th>
                    <th>Название</th>
                    <th>Переход к категории</th>

                </thead>
                <tbody>
                @foreach($category as $category)

                    <td>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>

                        <td>
                            <a href="{{ route('category', $category->id) }}">
                                Перейти к категории
                            </a>
                        </td>
                    </tr>
                    </th>
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

        @if (session('startImportCategories'))
        <div class="alert alert-success">
            Загрузка категорий запущена
        </div>
        @endif

        <form method="post" action="{{ route('importCategories') }}">
            @csrf
            <button type="submit" class="btn btn-link" style="color:blue"><h5>Загрузить категории</h5></button>
        </form>

        <p>
        <a class="dropdown"style="color:darkblue" href="{{ route('categoryCreated') }}">
        <b></b>
        <h5>Добавить категорию&#10148;</h5></a>
        </p>


        <a href="/admin/pageuser" style="color:blue"><h4>СПИСОК ПОЛЬЗОВАТЕЛЕЙ</h4></a>
        <br>
        <br>
        <a href="/admin/mapproduct" style="color:blue"><h4>СПИСОК ПРОДУКТОВ</h4></a>

        
@endsection
