@extends('layout')

@section('title')
    Створення замовлення
@endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    @endif
    <form method="POST" action="createOrder/check">
        @csrf
        <h1>Форма замовлення</h1>
            <p>
                <h3>Ваші контакти:</h3><br>
                <input type="text" name="nameC" id="nameC" placeholder="ПІБ*">
                <input type="number" name="telephoneC" id="telephoneC" placeholder="Номер телефону*">
                <input type="number" name="telephone2C" id="telephone2C" placeholder="Запасний телефон">
            </p><br>
            <p>
                <h3>Контакти відправника:</h3><br>
                <input type="text" name="nameS" id="nameS" placeholder="ПІБ*">
                <input type="text" name="cityS" id="cityS" placeholder="Місто*">
                <input type="text" name="addressS" id="addressS" placeholder="Адреса*">
                <input type="number" name="telephoneS" id="telephoneS" placeholder="Номер телефону*">
                <input type="number" name="telephone2S" id="telephone2S" placeholder="Запасний телефон">
            </p><br>
            <p>
                <h3>Контакти отримувача:</h3><br>
                <input type="text" name="nameD" id="nameD" placeholder="ПІБ*">
                <input type="text" name="cityD" id="cityD" placeholder="Місто*">
                <input type="text" name="addressD" id="addressD" placeholder="Адреса*">
                <input type="number" name="telephoneD" id="telephoneD" placeholder="Номер телефону*">
                <input type="number" name="telephone2D" id="telephone2D" placeholder="Запасний телефон">
            </p><br>
        <p>
            <h3>Дані замовлення:</h3><br>
            <input type="number" name="weight" id="weight" placeholder="Вага замовлення*"><br><br>
            <input type="text" name="brand" id="model" placeholder="Модель вантажівки"><br><br>
            <textarea name="description" id="description" placeholder="Опис"></textarea><br><br>
        </p>
        <button type="submit" value="Замовити" class="btn btn-success">Замовити</button><br><br><br><br>
    </form>

    <div class="pricing-header p-3 pb-md-4 mx-auto">
        <h3 class="display-6 fw-normal align-content-center">Прайс</h3>
        <div class="table-responsive text-center">
        <table class="table  table-sm text-light">
            <thead>
            <tr>
                <th scope="col">Бренд</th>
                <th scope="col">Модель</th>
                <th scope="col">Вантажність</th>
                <th scope="col">Розмір кузову</th>
                <th scope="col">Ціна 1км</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cars as $car)
                <tr class="text-light">
                    <td>{{$car->brand}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->maxWeight}}</td>
                    <td>{{$car->cargoAreaDimensions}}</td>
                    <td>{{$car->price1KM}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
