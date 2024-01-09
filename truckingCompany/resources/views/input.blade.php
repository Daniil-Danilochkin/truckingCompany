@extends('layout')

@section('title')
    База даних
@endsection

@section('main_content')
    <div class="text-center">
    <form method="POST" action="database">
        @csrf
        <h1>Тільки для працівників</h1><br>
        <input type="password" name="password" id="password" placeholder="Пароль">
        <button type="submit" class="btn btn-success">Увійти</button>
    </form>
    </div>
@endsection
