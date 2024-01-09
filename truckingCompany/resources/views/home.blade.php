@extends('layout')

@section('title')
    Головна сторінка
@endsection

@section('main_content')
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Чому вам варто вибрати нас?</h1>
        <p class="fs-5 text-light">Автовоз - компанія з багатолітнім досвідом роботи на ринку України. Більше 10 років
            плідної праці по автоперевезенню вантажів</p>
    </div>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col">
            <div class="card bg-primary mb-4 rounded-3 shadow-sm">
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">100.000+</h1>

                </div>
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Перевезень</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary mb-4 rounded-3 shadow-sm">
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">10.000+</h1>
                    <h1> </h1>
                </div>
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Задоволених клієнтів</h4>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-primary mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">Перевезення</h4>
                </div>
                <div class="card-body">
                        <h5>По всій Україні</h5>
                        <h5>У будь-яку погоду</h5>
                        <h5>Вантажі до 70 тон</h5>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
