<?php

namespace app\models;

use yii\base\Model;
use yii\db\Query;

class Reports extends \yii\db\ActiveRecord
{
    public function getAllRecords($car_id, $date)
    {
        $refills = Refills::find()
            ->where(['car_id' => $car_id])
            ->andWhere(['>=', 'date', $date])
            ->all();
        $incomes = Incomes::find()
            ->where(['car_id' => $car_id])
            ->andWhere(['>=', 'date', $date])
            ->all();
        $expenditures = Expenditures::find()
            ->where(['car_id' => $car_id])
            ->andWhere(['>=', 'date', $date])
            ->all();
        $services = Services::find()
            ->where(['car_id' => $car_id])
            ->andWhere(['>=', 'date', $date])
            ->all();

        return array_merge($refills, $incomes, $expenditures, $services);
    }

    public function getLiters($car_id, $date)
    {
        $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
        $liters = Refills::find()
            ->where(['car_id' => $car_id])
            ->andWhere(['>=', 'date', $date])
            ->sum('liters');

        return $liters ?: 0;
    }

    public function getMax($category, $car_id, $date)
    {
        $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
        if (!empty($category)) {
            $max = (new Query)->from($category)
                ->where(['car_id' => $car_id])
                ->andWhere(['>=', 'date', $date])
                ->orderBy(['amount' => SORT_DESC])
                ->one();
        } else {
            $records = $this->getAllRecords($car_id, $date);
            $max = array_reduce($records, function($carry, $item) {
                if ($carry === null || $item['amount'] > $carry['amount']) {
                    return $item;
                }
                return $carry;
            });
        }

        return $max ?: 0;
    }

    public function getMin($category, $car_id, $date)
    {
        $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
        if (!empty($category)) {
            $min = (new Query)->from($category)
                ->where(['car_id' => $car_id])
                ->andWhere(['>=', 'date', $date])
                ->orderBy(['amount' => SORT_ASC])
                ->one();
        } else {
            $records = $this->getAllRecords($car_id, $date);
            $min = array_reduce($records, function($carry, $item) {
                if ($carry === null || $item['amount'] < $carry['amount']) {
                    return $item;
                }
                return $carry;
            });
        }
        return $min ?: 0;
    }

    public function getSum($category, $car_id, $date)
    {
        $date = date('Y-m-d', strtotime($date, strtotime(date('Y-m-d'))));
        if (!empty($category)) {
            $sum = Reports::find()
                ->from($category)
                ->where(['car_id' => $car_id])
                ->andWhere(['>=', 'date', $date])
                ->sum('amount');
        } else {
            $records = $this->getAllRecords($car_id, $date);
            $sum = array_reduce($records, function ($carry, $item) {
                return $carry + $item['amount'];
            });
        }

        return $sum ?: 0;
    }
}
