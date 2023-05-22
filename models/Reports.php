<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Reports extends Model
{
    public $sum;

    public function getSum($category, $car_id)
    {
        if ($category == 'gas') {
            $array = Refills::findAll(['car_id' => $car_id]);
        } elseif ($category == 'income') {
            $array = Incomes::findAll(['car_id' => $car_id]);
        } elseif ($category == 'expenditure') {
            $array = Expenditures::findAll(['car_id' => $car_id]);
        } elseif ($category == 'service') {
            $array = Services::findAll(['car_id' => $car_id]);
        } else {
            $refills = Refills::findAll(['car_id' => $car_id]);
            $incomes = Incomes::findAll(['car_id' => $car_id]);
            $expenditures = Expenditures::findAll(['car_id' => $car_id]);
            $services = Services::findAll(['car_id' => $car_id]);

            $array = array_merge($expenditures, $incomes, $refills, $services);
        }

        $month = date('m');

        $sum = array_reduce($array,
        function ($carry, $object) {
            return $carry + $object->amount;
        }, 0);

        $totalPrice = array_reduce($array, function($carry, $object) use ($month) {
            var_dump(strtotime($object->date)); die();

            if (date('m', strtotime($object->date)) == $month) {
                return $carry + $object->price;
            }
            return $carry;
        }, 0);

        var_dump(date('m', strtotime($object->date))); die();
        return $sum;
    }

}
