@extends('../layouts.app')

@section('title')
    CПИСОК ПОЛЬЗОВАТЕЛЕЙ
@endsection

@section('content')


    <div class="container">

        <table class="table table-borderd mb-5">
            
            <thead>
                <th style="text-align: left">
                <th>id</th>
                <th>Имя</th>
                <th>Электронная почта</th>
                <th>Перейти к пользователю</th>

            </thead>
            <tbody style="text-align: end">
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
                </th>
                @endforeach
            </tbody>
        </table>




    <a href="/admin/spisokсategory" style="color:blue"><h4>СПИСОК КАТЕГОРИЙ</h4></a>
    <br>
    <br>
    <a href="/admin/mapproduct" style="color:blue"><h4>СПИСОК ПРОДУКТОВ</h4></a>
    @endsection
