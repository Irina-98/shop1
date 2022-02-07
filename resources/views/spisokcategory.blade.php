@extends('../layouts.app')

@section('title')
    CПИСОК КАТЕГОРИЙ
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                СПИСОК КАТЕГОРИЙ

            <table class="table table-borderd mb-5">
                <tbody>
                @foreach($category as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>

                        <td>
                            <a href="{{ route('category', $category->id) }}">
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


        <a href="/admin/pageuser">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
        <br>
        <a href="/admin/mapproduct">СПИСОК ПРОДУКТОВ</a>


@endsection
