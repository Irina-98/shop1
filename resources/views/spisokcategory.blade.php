@extends('../layouts.app')

@section('title')
    CПИСОК КАТЕГОРИЙ
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                СПИСОК КАТЕГОРИЙ
            <table class="table table-borderd mb-5">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Название</th>
                    </tr>
                </thead>
                <tbody></tbody>

            </table>



        </div>
    </div>
    @if (session('startExportCategories'))
        <div class="alert alert-success">
            Выгрузка категорий запущена
        </div>
        @endif

        <form method="post" action="{{ route('exportCategories') }}">
            @csrf
            <button type="submit" class="btn btn-link">Выгрузить категории</button>
        </form>


        <a href="/admin/pageuser">СТРАНИЦА ПОЛЬЗОВАТЕЛЕЙ</a>
        <br>
        <a href="/admin/mapproduct">СПИСОК ПРОДУКТОВ</a>

</div>
@endsection
