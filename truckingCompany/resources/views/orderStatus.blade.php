@extends('layout')

@section('title')
    Статус замовлення
@endsection

@section('main_content')
    <div class="text-center">
        <form method="POST" action="orderStatusSearch">
            @csrf
            <h1>Статус замовлення</h1><br>
            <input type="number" name="orderId" placeholder="Номер замовлення">
            <button type="submit" class="btn btn-success">Відстежити</button>
        </form><br><br>
    </div>
        @if($p != null && $p != 'false')
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                    <div class="card-header py-3">
                        <h1 class="card-title pricing-card-title">Замовник</h1>
                    </div>
                    <div class="card-body text-left">
                        <h4 class="my-0 fw-normal">{{$p[0]->name}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[0]->phone}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[0]->phone2}}</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="card-header py-3">
                        <h1 class="card-title pricing-card-title">Точка відправлення</h1>
                    </div>
                    <div class="card-body text-left">
                        <h4 class="my-0 fw-normal">{{$p[1]->name}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[1]->city}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[1]->address}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[1]->phone}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[1]->phone2}}</h4>
                    </div>
                </div>
                <div class="col">
                    <div class="card-header py-3">
                        <h1 class="card-title pricing-card-title">Точка призначення</h1>
                    </div>
                    <div class="card-body text-left">
                        <h4 class="my-0 fw-normal">{{$p[2]->name}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[2]->city}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[2]->address}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[2]->phone}}</h4><br>
                        <h4 class="my-0 fw-normal">{{$p[2]->phone2}}</h4>
                    </div>
                </div>
            </div>
            <div class="display-4 fw-normal">Замовлення</div><br>
            <div class="display-6 fw-normal">Дата подачі замовлення: {{$p[3]->dateReceiptOrder}}</div><br>
            <div class="display-6 fw-normal">Виконати до: {{$p[3]->dateTo}}</div><br>
            <div class="display-6 fw-normal">Дата отримання вантажу: {{$p[3]->dateReceive}}</div><br>
            <div class="display-6 fw-normal">Дата видачі вантажу: {{$p[3]->dateIssue}}</div><br>
            <div class="display-6 fw-normal">Статус: {{$p[3]->status}}</div><br>
            <div class="display-6 fw-normal">Вартість: {{$p[3]->cost}}</div><br>
            <div class="display-6 fw-normal">Вага: {{$p[3]->weight}}</div><br>
            <div class="display-6 fw-normal">Опис: {{$p[3]->description}}</div><br>
        @endif
            @if($p == 'false')
            <h1 class="card-title pricing-card-title">Замовлення з таким номером не знайдено</h1>
        @endif

@endsection
