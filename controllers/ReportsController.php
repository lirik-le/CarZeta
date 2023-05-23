<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Reports;


class ReportsController extends Controller
{
    public function actionIndex()
    {
        $model = new Reports();
        $car_id = Yii::$app->request->getQueryParam('car_id');
        $category = Yii::$app->request->getQueryParam('category');
        $sum = $model->getSum($category, $car_id);
        return $this->render('index', [
            'car_id' => $car_id,
            'sum' => $sum,
            'category' => $category,
        ]);
    }
}
