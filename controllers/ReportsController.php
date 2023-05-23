<?php

namespace app\controllers;

use app\models\Car;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Reports;


class ReportsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index'],
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function () {
                                $user_id = Car::findOne(['id' => Yii::$app->request->getQueryParam('car_id')])->user_id;
                                if ($user_id == Yii::$app->user->identity->id || Yii::$app->user->identity->role)
                                    return true;
                            }
                        ],
                    ],
                    'denyCallback' => function () {
                        return $this->goHome();
                    },
                ],
            ]
        );
    }
    public function actionIndex()
    {
        $model = new Reports();

        $car_id = Yii::$app->request->getQueryParam('car_id');
        $category = Yii::$app->request->getQueryParam('category');
        $date = Yii::$app->request->getQueryParam('date');

        $sum = $model->getSum($category, $car_id, $date);
        $liters = $model->getliters($car_id, $date);

        return $this->render('index', [
            'car_id' => $car_id,
            'sum' => $sum,
            'category' => $category,
            'date' => $date,
            'liters' => $liters,
        ]);
    }
}
