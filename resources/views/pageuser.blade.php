@extends('../layouts.app')

@section('title')
    CПИСОК ПОЛЬЗОВАТЕЛЕЙ
@endsection

@section('content')


    <div class="container">
        <div class="row justify-content">
        <h3 style="
            text-align: center;
        ">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</h3>
        <br>

        <table class="table table-borderd mb-5">
            

                    
            <thead>
                <th>
                <th>id</th>
                <th>Имя</th>
                <th>Электронная почта</th>
                <th>Перейти к пользователю</th>

            </thead>
            

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



    <a href="/admin/spisokсategory">СПИСОК КАТЕГОРИЙ</a>
    <br>
    <a href="/admin/mapproduct">СПИСОК ПРОДУКТОВ</a>
    @endsection
