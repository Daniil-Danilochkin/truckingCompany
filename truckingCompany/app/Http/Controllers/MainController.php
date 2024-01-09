<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Customer;
use App\Models\Orders;
use App\Models\Points;
use App\Models\stuff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function aboutCompany()
    {
        return view('aboutCompany');
    }

    public function price()
    {
        $cars = new Cars();
        return view('price', ['cars' => $cars->all()]);
    }

    public function createOrder()
    {
        $cars = new Cars();
        return view('createOrder', ['cars' => $cars->all()]);
    }

    public function createOrder_check(Request $request)
    {
        $valid = $request->validate([
            'nameC' => 'required|min:10|max:200',
            'telephoneC' => 'required|min:12|max:12',
            'telephone2C' => 'max:12',
            'nameS' => 'required|min:10|max:200',
            'cityS' => 'required|min:3|max:50',
            'addressS' => 'required|min:5|max:200',
            'telephoneS' => 'required|min:12|max:12',
            'telephone2S' => 'max:12',
            'nameD' => 'required|min:10|max:200',
            'cityD' => 'required|min:3|max:50',
            'addressD' => 'required|min:5|max:200',
            'telephoneD' => 'required|min:12|max:12',
            'telephone2D' => 'max:12',
            'weight' => 'max:6',
            'carModel' => 'max:200',
            'description' => 'max:1000'
        ]);

        $customer = false;
        foreach (Customer::all() as $t) {
            if ($t->phone == $request->input('telephoneC') || $t->phone === $request->input('telephone2C'))
            {
                if ((string)$t->name != (string)$request->input('nameC'))
                {
                    echo "<script type='text/javascript'>alert('Замолення не зареєстровано. Користувач з таким номером зареєстрований під іншим ім`ям. {$t->name}   {$request->input('nameC')}');</script>";
                    return view('createOrder', ['cars' => Cars::all()]);
                }
                else
                {
                    $customer = $t->id;
                }
            }
        }
        if ($customer == false) {
            $newCustomer = new Customer();
            $newCustomer->name = $request->input('nameC');
            $newCustomer->phone = $request->input('telephoneC');
            $newCustomer->phone2 = $request->input('telephone2C');
            $newCustomer->save();
            $customer = $newCustomer->id;
        }

        $shipmentPoint = false;
        foreach (Points::all() as $t) {
            if ($t->phone == $request->input('telephoneS') || $t->phone == $request->input('telephone2S')) {
                if ($t->name == $request->input('nameS'))
                {
                    $shipmentPoint = $t->id;
                }
                else
                {
                    echo "<script type='text/javascript'>alert('Замолення не зареєстровано. Точка доставки з таким номером зареєстрована під іншим ім`ям');</script>";
                    return view('createOrder', ['cars' => Cars::all()]);
                }
            }
        }
        if ($shipmentPoint == false) {
            $newShipmentPoint = new Points();
            $newShipmentPoint->name = $request->input('nameS');
            $newShipmentPoint->city = $request->input('cityS');
            $newShipmentPoint->address = $request->input('addressS');
            $newShipmentPoint->phone = $request->input('telephoneS');
            $newShipmentPoint->phone2 = $request->input('telephone2S');
            $newShipmentPoint->save();
            $shipmentPoint = $newShipmentPoint->id;
        }

        $destinationPoint = false;
        foreach (Points::all() as $t) {
            if ($t->phone == $request->input('telephoneD') || $t->phone == $request->input('telephone2D')) {
                if ($t->name != $request->input('nameD'))
                {
                    echo "<script type='text/javascript'>alert('Замолення не зареєстровано. Точка доставки з таким номером зареєстрована під іншим ім`ям');</script>";
                    return view('createOrder', ['cars' => Cars::all()]);
                }
                else
                {
                    $destinationPoint = $t->id;
                }
            }
        }
        if ($destinationPoint == false) {
            $newDestinationPoint = new Points();
            $newDestinationPoint->name = $request->input('nameD');
            $newDestinationPoint->city = $request->input('cityD');
            $newDestinationPoint->address = $request->input('addressD');
            $newDestinationPoint->phone = $request->input('telephoneD');
            $newDestinationPoint->phone2 = $request->input('telephone2D');
            $newDestinationPoint->save();
            $destinationPoint = $newDestinationPoint->id;
        }

        $car = null;
        foreach (Cars::all() as $t) {
            if ($t->model == $request->input('model')) {
                $car = $t->number;
            }
        }

        $newOrder = new Orders();
        $newOrder->shipmentPoint = $shipmentPoint;
        $newOrder->destinationPoint = $destinationPoint;
        $newOrder->car = $car;
        $newOrder->operator = 2;
        $newOrder->customer = $customer;
        $newOrder->weight = $request->input('weight');
        $newOrder->status = 'не оброблено';
        $newOrder->description = $request->input('description');
        $newOrder->dateReceiptOrder = date('Y-m-d');
        $newOrder->save();

        echo "<script type='text/javascript'>alert('Ваша заявка прийнята. Номер замовлення $newOrder->id');</script>";

        return view('createOrder_check', ['cars' => Cars::all()])->with('id', $newOrder->id);
    }

    public function input()
    {
        return view('input');
    }

    public function database(Request $request)
    {
        if($request->input('password') == "R8XQ*k))iohjblE8") {
            return view('database');
        }
        else
        {
            return redirect('input');
        }
    }

    public function database_click(Request $request)
    {
        //dd($request);
        $button = array_keys($request->input('button'))[0];
        switch (stristr($button, '_', true))
        {
            case "orders":
                $this->databaseOrdersButton(stristr($button, '_', false), $request);
                break;
            case "customers":
                $this->databaseCustomersButton(stristr($button, '_', false), $request);
                break;
            case "points":
                $this->databasePointsButton(stristr($button, '_', false), $request);
                break;
            case "cars":
                $this->databaseCarsButton(stristr($button, '_', false), $request);
                break;
            case "stuff":
                $this->databaseStuffButton(stristr($button, '_', false), $request);
                break;
        }


        return view('database');
    }

    public function databaseOrdersButton($button, $request)
    {
        preg_match_all('/[0-9]+/', $button, $array);

        switch (substr($button, 0, 4))
        {
            case '_Sav':
                $n = $array[0][0];
                $orderId = $request->input('ordersId'.$n);
                $order = Orders::all()->find($orderId);
                $order->shipmentPoint = $request->input('ordersShipmentPoint'.$n);
                $order->destinationPoint = $request->input('ordersDestinationPoint' . $n);
                $order->car = $request->input('ordersCar' . $n);
                $order->driver = $request->input('ordersDriver' . $n);
                $order->operator = $request->input('ordersOperator' . $n);
                $order->customer = $request->input('ordersCustomer' . $n);
                $order->dateTo = $request->input('ordersDateTo' . $n);
                $order->dateReceive = $request->input('ordersDateReceive' . $n);
                $order->dateIssue = $request->input('ordersDateIssue' . $n);
                $order->status = $request->input('ordersStatus' . $n);
                $order->cost = $request->input('ordersCost' . $n);
                $order->weight = $request->input('ordersWeight' . $n);
                $order->description = $request->input('ordersDescription' . $n);
                $order->save();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка сохранить / $n');</script>";
                break;
            case '_Del':
                $n = $array[0][0];
                $orderId = $request->input('ordersId'.$n);
                $order = Orders::all()->find($orderId);
                $order->delete();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка удалить / $n');</script>";
                break;
            case '_Add':
                $order = new Orders();
                $order->shipmentPoint = $request->input('ordersNewShipmentPoint');
                $order->destinationPoint = $request->input('ordersNewDestinationPoint');
                $order->car = $request->input('ordersNewCar');
                $order->driver = $request->input('ordersNewDriver');
                $order->operator = $request->input('ordersNewOperator');
                $order->customer = $request->input('ordersNewCustomer');
                $order->dateReceiptOrder = date('Y-m-d');
                $order->dateTo = $request->input('ordersNewDateTo');
                $order->dateReceive = $request->input('ordersNewDateReceive');
                $order->dateIssue = $request->input('ordersNewDateIssue');
                $order->status = $request->input('ordersNewStatus');
                $order->cost = $request->input('ordersNewCost');
                $order->weight = $request->input('ordersNewWeight');
                $order->description = $request->input('ordersNewDescription');
                $order->save();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка добавить');</script>";
                break;
        }
    }

    public function databaseCustomersButton($button, $request)
    {
        preg_match_all('/[0-9]+/', $button, $array);

        switch (substr($button, 0, 4))
        {
            case '_Sav':
                $n = $array[0][0];
                $customerId = $request->input('customersId'.$n);
                $customer = Customer::all()->find($customerId);
                $customer->name = $request->input('customersName'.$n);
                $customer->phone = $request->input('customersPhone' . $n);
                $customer->phone2 = $request->input('customersSecondPhone' . $n);
                $customer->save();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка сохранить / $n');</script>";
                break;
            case '_Del':
                $n = $array[0][0];
                $customerId = $request->input('customersId'.$n);
                $customer = Customer::all()->find($customerId);
                $customer->delete();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка удалить / $n');</script>";
                break;
            case '_Add':
                $customer = new Customer();
                $customer->name = $request->input('customersNewName');
                $customer->phone = $request->input('customersNewPhone');
                $customer->phone2 = $request->input('customersNewSecondPhone');
                $customer->save();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка добавить');</script>";
                break;
        }
    }

    public function databasePointsButton($button, $request)
    {
        preg_match_all('/[0-9]+/', $button, $array);

        switch (substr($button, 0, 4))
        {
            case '_Sav':
                $n = $array[0][0];
                $pointId = $request->input('pointsId'.$n);
                $point = Points::all()->find($pointId);
                $point->name = $request->input('pointsName'.$n);
                $point->city = $request->input('pointsCity'.$n);
                $point->address = $request->input('pointsAddress'.$n);
                $point->phone = $request->input('pointsPhone' . $n);
                $point->phone2 = $request->input('pointsSecondPhone' . $n);
                $point->save();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка сохранить / $n');</script>";
                break;
            case '_Del':
                $n = $array[0][0];
                $pointId = $request->input('pointsId'.$n);
                $point = Points::all()->find($pointId);
                $point->delete();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка удалить / $n');</script>";
                break;
            case '_Add':
                $point = new Points();
                $point->name = $request->input('pointsNewName');
                $point->city = $request->input('pointsNewCity');
                $point->address = $request->input('pointsNewAddress');
                $point->phone = $request->input('pointsNewPhone');
                $point->phone2 = $request->input('pointsNewSecondPhone');
                $point->save();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка добавить');</script>";
                break;
        }
    }

    public function databaseCarsButton($button, $request)
    {
        preg_match_all('/[0-9]+/', $button, $array);

        switch (substr($button, 0, 4))
        {
            case '_Sav':
                $n = $array[0][0];
                $carId = $request->input('carsId'.$n);
                $car = Cars::all()->find($carId);
                $car->number = $request->input('carsNumber'.$n);
                $car->brand = $request->input('carsBrand'.$n);
                $car->model = $request->input('carsModel'.$n);
                $car->maxWeight = $request->input('carsMaxWeight' . $n);
                $car->cargoAreaDimensions = $request->input('carsCargoAreaDimensions' . $n);
                $car->conditionCar = $request->input('carsConditionCar' . $n);
                $car->insuranceNumber = $request->input('carsInsuranceNumber' . $n);
                $car->price1KM = $request->input('carsPriceKM' . $n);
                $car->save();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка сохранить / $n');</script>";
                break;
            case '_Del':
                $n = $array[0][0];
                $carId = $request->input('carsId'.$n);
                $car = Cars::all()->find($carId);
                $car->delete();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка удалить / $n');</script>";
                break;
            case '_Add':
                $car = new Cars();
                $car->number = $request->input('carsNewNumber');
                $car->brand = $request->input('carsNewBrand');
                $car->model = $request->input('carsNewModel');
                $car->maxWeight = $request->input('carsNewMaxWeight');
                $car->cargoAreaDimensions = $request->input('carsNewCargoAreaDimensions');
                $car->conditionCar = $request->input('carsNewConditionCar');
                $car->insuranceNumber = $request->input('carsNewInsuranceNumber');
                $car->price1KM = $request->input('carsNewPriceKM');
                $car->save();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка добавить');</script>";
                break;
        }
    }

    public function databaseStuffButton($button, $request)
    {
        preg_match_all('/[0-9]+/', $button, $array);

        switch (substr($button, 0, 4))
        {
            case '_Sav':
                $n = $array[0][0];
                $stuffId = $request->input('stuffId'.$n);
                $stuff = stuff::all()->find($stuffId);
                $stuff->surname = $request->input('stuffSurname'.$n);
                $stuff->name = $request->input('stuffName'.$n);
                $stuff->patronumic = $request->input('stuffPatronumic'.$n);
                $stuff->phone = $request->input('stuffPhone'.$n);
                $stuff->phone2 = $request->input('stuffSecondPhone'.$n);
                $stuff->position = $request->input('stuffPosition'.$n);
                $stuff->salary = $request->input('stuffSalary'.$n);
                $stuff->insuranceNumber = $request->input('stuffInsuranceNumber'.$n);
                $stuff->birthDate = $request->input('stuffBirthDate'.$n);
                $stuff->dateStartWork = $request->input('stuffDateStartWork'.$n);
                $stuff->dateStopWork = $request->input('stuffDateStopWork'.$n);
                $stuff->passport = $request->input('stuffPassport'.$n);
                $stuff->driverLicense = $request->input('stuffDriverLicense'.$n);
                $stuff->save();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка сохранить / $n');</script>";
                break;
            case '_Del':
                $n = $array[0][0];
                $stuffId = $request->input('stuffId'.$n);
                $stuff = stuff::all()->find($stuffId);
                $stuff->delete();
                //echo "<script type='text/javascript'>alert('Заказчики / кнопка удалить / $n');</script>";
                break;
            case '_Add':
                $stuff = new stuff();
                $stuff->surname = $request->input('stuffNewSurname');
                $stuff->name = $request->input('stuffNewName');
                $stuff->patronumic = $request->input('stuffNewPatronumic');
                $stuff->phone = $request->input('stuffNewPhone');
                $stuff->phone2 = $request->input('stuffNewSecondPhone');
                $stuff->position = $request->input('stuffNewPosition');
                $stuff->salary = $request->input('stuffNewSalary');
                $stuff->insuranceNumber = $request->input('stuffNewInsuranceNumber');
                $stuff->birthDate = $request->input('stuffNewBirthDate');
                $stuff->dateStartWork = $request->input('stuffNewDateStartWork');
                $stuff->dateStopWork = $request->input('stuffNewDateStopWork');
                $stuff->passport = $request->input('stuffNewPassport');
                $stuff->driverLicense = $request->input('stuffNewDriverLicense');
                $stuff->save();
                //echo "<script type='text/javascript'>alert('Заказы / кнопка добавить');</script>";
                break;
        }
    }

    public function orderStatus()
    {
        return view('orderStatus')->with('p', null);
    }

    public function orderStatusSearch(Request $request)
    {
        $orderId = $request->input('orderId');
        if($orderId != null)
        {
            $order = Orders::all()->find($orderId);
            $customer = Customer::all()->find($order->customer);
            $SPoint = Points::all()->find($order->shipmentPoint);
            $DPoint = Points::all()->find($order->destinationPoint);
            return view('orderStatus')->with("p", [$customer, $SPoint, $DPoint, $order]);
        }
        return view('orderStatus')->with("p", 'false');
    }

}
