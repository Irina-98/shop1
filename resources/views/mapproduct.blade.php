@extends('../layouts.app')

@section('title')
    CПИСОК ПРОДУКТОВ
@endsection

@section('content')


<div class="row justify-content-center">
<h1 class="text-center">СПИСОК ПРОДУКТОВ</h1>
<div class="container">
        
            
        <table class="table table-borderd mb-5">

<table class="zigzag" text-align: center>
  <thead>
    <tr>
      <th class="header">#</th>
      <th class="header">Наименование</th>
      <th class="header">Цена</th>
      <th class="header">Latest</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Wayne Rooney</td>
      <td>53</td>
      <td>06 Sep 2003</td>
      <td>27 Jun 2016</td>
    </tr>
    <tr>
      <td>Bobby Charlton</td>
      <td>49</td>
      <td>19 Apr 1958</td>
      <td>20 May 1970</td>
    </tr>
  
    
    
  </tbody>
</table>


<a href="/admin/pageuser">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
<br>
<a href="/admin/spisokсategory">СПИСОК КАТЕГОРИЙ</a>
>>>>>>> origin/master
@endsection
