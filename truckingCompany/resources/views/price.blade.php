@extends('layout')

@section('title')
    Прайс
@endsection

@section('main_content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Прайс</h1>
        <div class="table-responsive">
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
