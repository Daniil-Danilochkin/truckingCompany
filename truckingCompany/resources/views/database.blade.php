@extends('layout')

@section('title')
    База даних
@endsection

@section('main_content')
    <form method="POST" action="databaseСlick">
        @csrf
    <div class="pricing-header p-3 pb-md-4 mx-auto">
            <div class="display-3 fw-normal align-content-center">Замовлення</div><br>
            <div class="table-responsive text-center">
                <table class="table  table-sm text-light">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Номер</th>
                        <th scope="col">Відправник</th>
                        <th scope="col">Одержувач</th>
                        <th scope="col">Машина</th>
                        <th scope="col">Водій</th>
                        <th scope="col">Оператор</th>
                        <th scope="col">Замовник</th>
                        <th scope="col">Дата заяви</th>
                        <th scope="col">Виконати до</th>
                        <th scope="col">Дата отримання</th>
                        <th scope="col">Дата видачі</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Вартісь</th>
                        <th scope="col">Вага</th>
                        <th scope="col">Опис</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count(\App\Models\Orders::all()); $i++)
                        <tr class="text-light">
                            <td><button  type="submit" class="btn btn-success" name="button[orders_Save{{$i}}]">Зберегти зміни</button></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersId{{$i}}" readonly value="{{\App\Models\Orders::all()[$i]->id}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersShipmentPoint{{$i}}" value="{{\App\Models\Orders::all()[$i]->shipmentPoint}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersDestinationPoint{{$i}}" value="{{\App\Models\Orders::all()[$i]->destinationPoint}}"></td>
                            <td><input class="bg-dark text-light" type="text" name="ordersCar{{$i}}" value="{{\App\Models\Orders::all()[$i]->car}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersDriver{{$i}}" value="{{\App\Models\Orders::all()[$i]->driver}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersOperator{{$i}}" value="{{\App\Models\Orders::all()[$i]->operator}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersCustomer{{$i}}" value="{{\App\Models\Orders::all()[$i]->customer}}"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersDateReceipt{{$i}}" readonly value="{{\App\Models\Orders::all()[$i]->dateReceiptOrder}}"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersDateTo{{$i}}" value="{{\App\Models\Orders::all()[$i]->dateTo}}"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersDateReceive{{$i}}" value="{{\App\Models\Orders::all()[$i]->dateReceive}}"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersDateIssue{{$i}}" value="{{\App\Models\Orders::all()[$i]->dateIssue}}"></td>
                            <td><input class="bg-dark text-light" type="text" name="ordersStatus{{$i}}" value="{{\App\Models\Orders::all()[$i]->status}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersCost{{$i}}" value="{{\App\Models\Orders::all()[$i]->cost}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersWeight{{$i}}" value="{{\App\Models\Orders::all()[$i]->weight}}"></td>
                            <td><input class="bg-dark text-light" type="text" name="ordersDescription{{$i}}" value="{{\App\Models\Orders::all()[$i]->description}}"></td>
                            <td><button type="submit" class="btn btn-danger" name="button[orders_Delete{{$i}}]">Видалити</button></td>
                        </tr>
                    @endfor
                        <tr class="text-light">
                            <td><button type="submit" class="btn btn-primary" name="button[orders_Add]">Додати</button></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewNumber" readonly></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewShipmentPoint"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewDestinationPoint"></td>
                            <td><input class="bg-dark text-light" type="text" name="ordersNewCar"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewDriver"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewOperator"></td>
                            <td><input class="bg-dark text-light" type="number"  name="ordersNewCustomer"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersNewDateReceipt" readonly></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersNewDateTo"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersNewDateReceive"></td>
                            <td><input class="bg-dark text-light" type="date" name="ordersNewDateIssue"></td>
                            <td><input class="bg-dark text-light" type="text" name="ordersNewStatus"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewCost"></td>
                            <td><input class="bg-dark text-light" type="number" name="ordersNewWeight"></td>
                            <td><input class="bg-dark text-light" type="text"  name="ordersNewDescription"></td>
                        </tr>
                    </tbody>
                </table>

            </div><br><br>

            <div class="display-3 fw-normal align-content-center">Замовники</div><br>
            <div class="table-responsive text-center">
                <table class="table  table-sm text-light">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Номер</th>
                        <th scope="col">Найменування</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Телефон2</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count(\App\Models\Customer::all()); $i++)
                        <tr class="text-light">
                            <td><button  type="submit" class="btn btn-success" name="button[customers_Save{{$i}}]">Зберегти зміни</button></td>
                            <td><input class="bg-dark text-light" type="number" name="customersId{{$i}}"readonly value="{{\App\Models\Customer::all()[$i]->id}}"></td>
                            <td><input style="width: 100%" class="bg-dark text-light" type="text" name="customersName{{$i}}" value="{{\App\Models\Customer::all()[$i]->name}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="customersPhone{{$i}}" value="{{\App\Models\Customer::all()[$i]->phone}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="customersSecondPhone{{$i}}" value="{{\App\Models\Customer::all()[$i]->phone2}}"></td>
                            <td><button type="submit" class="btn btn-danger" name="button[customers_Delete{{$i}}]">Видалити</button></td>
                        </tr>
                    @endfor
                    <tr class="text-light">
                        <td><button type="submit" class="btn btn-primary" name="button[customers_Add]">Додати</button></td>
                        <td><input class="bg-dark text-light" type="number" name="customersNewId" readonly></td>
                        <td><input class="bg-dark text-light" type="text" name="customersNewName"></td>
                        <td><input class="bg-dark text-light" type="number" name="customersNewPhone"></td>
                        <td><input class="bg-dark text-light" type="number" name="customersNewSecondPhone"></td>
                    </tr>
                    </tbody>
                </table>

            </div><br><br>

            <div class="display-3 fw-normal align-content-center">Точки відправлення/отримання</div><br>
            <div class="table-responsive text-center">
                <table class="table  table-sm text-light">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Номер</th>
                        <th scope="col">Найменування</th>
                        <th scope="col">Місто</th>
                        <th scope="col">Адреса</th>
                        <th scope="col">Телефон</th>
                        <th scope="col">Телефон2</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for ($i = 0; $i < count(\App\Models\Points::all()); $i++)
                        <tr class="text-light">
                            <td><button  type="submit" class="btn btn-success" name="button[points_Save{{$i}}]">Зберегти зміни</button></td>
                            <td><input class="bg-dark text-light" type="number" name="pointsId{{$i}}"readonly value="{{\App\Models\Points::all()[$i]->id}}"></td>
                            <td><input style="width: 300px" class="bg-dark text-light" type="text" name="pointsName{{$i}}" value="{{\App\Models\Points::all()[$i]->name}}"></td>
                            <td><input class="bg-dark text-light" type="text" name="pointsCity{{$i}}" value="{{\App\Models\Points::all()[$i]->city}}"></td>
                            <td><input style="width: 300px" class="bg-dark text-light" type="text" name="pointsAddress{{$i}}" value="{{\App\Models\Points::all()[$i]->address}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="pointsPhone{{$i}}" value="{{\App\Models\Points::all()[$i]->phone}}"></td>
                            <td><input class="bg-dark text-light" type="number" name="pointsSecondPhone{{$i}}" value="{{\App\Models\Points::all()[$i]->phone2}}"></td>
                            <td><button type="submit" class="btn btn-danger" name="button[points_Delete{{$i}}]">Видалити</button></td>
                        </tr>
                    @endfor
                    <tr class="text-light">
                        <td><button type="submit" class="btn btn-primary" name="button[points_Add]">Додати</button></td>
                        <td><input class="bg-dark text-light" type="number" name="pointsNewId" readonly></td>
                        <td><input style="width: 300px" class="bg-dark text-light" type="text" name="pointsNewName"></td>
                        <td><input class="bg-dark text-light" type="text" name="pointsNewCity"></td>
                        <td><input style="width: 300px" class="bg-dark text-light" type="text" name="pointsNewAddress"></td>
                        <td><input class="bg-dark text-light" type="number" name="pointsNewPhone"></td>
                        <td><input class="bg-dark text-light" type="number" name="pointsNewSecondPhone"></td>
                    </tr>
                    </tbody>
                </table>

            </div><br><br>

        <div class="display-3 fw-normal align-content-center">Автомобілі</div>
        <div class="table-responsive text-center">
            <table class="table  table-sm text-light">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Порядковий номер</th>
                    <th scope="col">Автомобільний номер</th>
                    <th scope="col">Бренд</th>
                    <th scope="col">Модель</th>
                    <th scope="col">Вантажність</th>
                    <th scope="col">Габарити вантажного відділення</th>
                    <th scope="col">Технічний стан</th>
                    <th scope="col">Номер страховки</th>
                    <th scope="col">Ціна за 1км</th>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < count(\App\Models\Cars::all()); $i++)
                    <tr class="text-light">
                        <td><button  type="submit" class="btn btn-success" name="button[cars_Save{{$i}}]">Зберегти зміни</button></td>
                        <td><input class="bg-dark text-light" type="text" name="carsId{{$i}}"readonly value="{{\App\Models\Cars::all()[$i]->id}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="carsNumber{{$i}}" value="{{\App\Models\Cars::all()[$i]->number}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="carsBrand{{$i}}" value="{{\App\Models\Cars::all()[$i]->brand}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="carsModel{{$i}}" value="{{\App\Models\Cars::all()[$i]->model}}"></td>
                        <td><input class="bg-dark text-light" type="number" name="carsMaxWeight{{$i}}" value="{{\App\Models\Cars::all()[$i]->maxWeight}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="carsCargoAreaDimensions{{$i}}" value="{{\App\Models\Cars::all()[$i]->cargoAreaDimensions}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="carsConditionCar{{$i}}" value="{{\App\Models\Cars::all()[$i]->conditionCar}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="carsInsuranceNumber{{$i}}" value="{{\App\Models\Cars::all()[$i]->insuranceNumber}}"></td>
                        <td><input class="bg-dark text-light" type="number" name="carsPriceKM{{$i}}" value="{{\App\Models\Cars::all()[$i]->price1KM}}"></td>
                        <td><button type="submit" class="btn btn-danger" name="button[cars_Delete{{$i}}]">Видалити</button></td>
                    </tr>
                @endfor
                <tr class="text-light">
                    <td><button type="submit" class="btn btn-primary" name="button[cars_Add]">Додати</button></td>
                    <td><input class="bg-dark text-light" type="number" name="carsNewId" readonly></td>
                    <td><input class="bg-dark text-light" type="text" name="carsNewNumber"></td>
                    <td><input class="bg-dark text-light" type="text" name="carsNewBrand"></td>
                    <td><input class="bg-dark text-light" type="text" name="carsNewModel"></td>
                    <td><input class="bg-dark text-light" type="number" name="carsNewMaxWeight"></td>
                    <td><input class="bg-dark text-light" type="text" name="carsNewCargoAreaDimensions"></td>
                    <td><input class="bg-dark text-light" type="text" name="carsNewConditionalCar"></td>
                    <td><input class="bg-dark text-light" type="text" name="carsNewInsuranceNumber"></td>
                    <td><input class="bg-dark text-light" type="number" name="carsNewPriceKM"></td>
                </tr>
                </tbody>
            </table>
        </div><br><br>

        <div class="display-3 fw-normal align-content-center">Працівники</div>
        <div class="table-responsive text-center">
            <table class="table  table-sm text-light">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Табельний номер</th>
                    <th scope="col">Пізвище</th>
                    <th scope="col">Ім`я</th>
                    <th scope="col">По батькові</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Телефон2</th>
                    <th scope="col">Посада</th>
                    <th scope="col">Зарплата</th>
                    <th scope="col">Номер страховки</th>
                    <th scope="col">Дата народження</th>
                    <th scope="col">Дата прийому</th>
                    <th scope="col">Дата звільнення</th>
                    <th scope="col">Паспорт</th>
                    <th scope="col">Водійське посвідчення</th>
                </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < count(\App\Models\Stuff::all()); $i++)
                    <tr class="text-light">
                        <td><button  type="submit" class="btn btn-success" name="button[stuff_Save{{$i}}]">Зберегти зміни</button></td>
                        <td><input class="bg-dark text-light" type="number" name="stuffId{{$i}}"readonly value="{{\App\Models\stuff::all()[$i]->id}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffSurname{{$i}}" value="{{\App\Models\stuff::all()[$i]->surname}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffName{{$i}}" value="{{\App\Models\stuff::all()[$i]->name}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffPatronumic{{$i}}" value="{{\App\Models\stuff::all()[$i]->patronumic}}"></td>
                        <td><input class="bg-dark text-light" type="number" name="stuffPhone{{$i}}" value="{{\App\Models\stuff::all()[$i]->phone}}"></td>
                        <td><input class="bg-dark text-light" type="number" name="stuffSecondPhone{{$i}}" value="{{\App\Models\stuff::all()[$i]->phone2}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffPosition{{$i}}" value="{{\App\Models\stuff::all()[$i]->position}}"></td>
                        <td><input class="bg-dark text-light" type="number" name="stuffSalary{{$i}}" value="{{\App\Models\stuff::all()[$i]->salary}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffInsuranceNumber{{$i}}" value="{{\App\Models\stuff::all()[$i]->insuranceNumber}}"></td>
                        <td><input class="bg-dark text-light" type="date" name="stuffBirthDate{{$i}}" value="{{\App\Models\stuff::all()[$i]->birthDate}}"></td>
                        <td><input class="bg-dark text-light" type="date" name="stuffDateStartWork{{$i}}" value="{{\App\Models\stuff::all()[$i]->dateStartWork}}"></td>
                        <td><input class="bg-dark text-light" type="date" name="stuffDateStopWork{{$i}}" value="{{\App\Models\stuff::all()[$i]->dateStopWork}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffPassport{{$i}}" value="{{\App\Models\stuff::all()[$i]->passport}}"></td>
                        <td><input class="bg-dark text-light" type="text" name="stuffDriverLicense{{$i}}" value="{{\App\Models\stuff::all()[$i]->driverLicense}}"></td>
                        <td><button type="submit" class="btn btn-danger" name="button[stuff_Delete{{$i}}]">Видалити</button></td>
                    </tr>
                @endfor
                <tr class="text-light">
                    <td><button type="submit" class="btn btn-primary" name="button[stuff_Add]">Додати</button></td>
                    <td><input class="bg-dark text-light" type="number" name="stuffNewId" readonly></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewSurname"></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewName"></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewPatronumic"></td>
                    <td><input class="bg-dark text-light" type="number" name="stuffNewPhone"></td>
                    <td><input class="bg-dark text-light" type="number" name="stuffNewPhone2"></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewPosition"></td>
                    <td><input class="bg-dark text-light" type="number" name="stuffNewSalary"></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewInsuranceNumber"></td>
                    <td><input class="bg-dark text-light" type="date" name="stuffNewBirthDate"></td>
                    <td><input class="bg-dark text-light" type="date" name="stuffNewDateStartWork"></td>
                    <td><input class="bg-dark text-light" type="date" name="stuffNewDateStopWork"></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewPassport"></td>
                    <td><input class="bg-dark text-light" type="text" name="stuffNewDriverLicense"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </form>
@endsection
