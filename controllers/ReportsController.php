<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class ReportsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
