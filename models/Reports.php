<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;

class Reports extends Model
{
    public function getSum($category, $car_id)
    {
        $date = Yii::$app->request->getQueryParam('date');
        switch ($category) {
            case 'refills':
                if ($date !== NULL) {
                    $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
                    $sum = Refills::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                } else {
                    $sum = Refills::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                }
                break;
            case 'incomes':
                if ($date !== NULL) {
                    $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
                    $sum = Incomes::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                } else {
                    $sum = Incomes::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                }
                break;
            case 'expenditures':
                if ($date !== NULL) {
                    $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
                    $sum = Expenditures::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                } else {
                    $sum = Expenditures::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                }
                break;
            case 'services':
                if ($date !== NULL) {
                    $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
                    $sum = Services::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                } else {
                    $sum = Services::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                }
                break;
            default:
                if ($date !== NULL) {
                    $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
                    $refills = Refills::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                    $incomes = Incomes::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                    $expenditures = Expenditures::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                    $services = Services::find()
                        ->where(['car_id' => $car_id])
                        ->andWhere(['>=', 'date', $date])
                        ->sum('amount');
                    $sum = $refills + $incomes + $expenditures + $services;
                } else {
                    $refills = Refills::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                    $incomes = Incomes::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                    $expenditures = Expenditures::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                    $services = Services::find()
                        ->where(['car_id' => $car_id])
                        ->sum('amount');
                    $sum = $refills + $incomes + $expenditures + $services;
                }
        }
        return $sum ? : 0;
    }
}
