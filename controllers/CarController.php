<?php

namespace app\controllers;

use app\models\Car;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
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
                    'only' => ['index', 'view', 'create', 'update', 'delete', 'notes'],
                    'rules' => [
                        [
                            'actions' => ['index', 'view'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function () {
                                return Yii::$app->user->identity->role;
                            }
                        ],
                        [
                            'actions' => ['create', 'update', 'delete', 'notes'],
                            'allow' => true,
                            'roles' => ['@']
                        ],
                    ],
                    'denyCallback' => function () {
                        return $this->goHome();
                    },
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Car models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Car::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Car model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionNotes()
    {
        $car = Car::findOne(Yii::$app->request->getQueryParam('car_id'));
        $expenditures = $car->expenditures;
        $incomes = $car->incomes;
        $refills = $car->refills;
        $services = $car->services;

        $notes = array_merge($expenditures, $incomes, $refills, $services);
        ArrayHelper::multisort($notes, ['date'], [SORT_DESC]);

        $pagination = new Pagination([
            'totalCount' => count($notes),
            'pageSize' => 10,
        ]);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $notes,
            'pagination' => [
                'pageSize' => $pagination->pageSize,
                'page' => $pagination->getPage(),
            ],
        ]);

        $notes = $dataProvider->getModels();
        $pages = $dataProvider->getPagination();

        return $this->render('notes', ['notes' => $notes, 'pages' => $pages]);
    }

    /**
     * Creates a new Car model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Car();
        $model->file = UploadedFile::getInstance($model, 'file');

        if ($this->request->isPost) {
            $model->user_id = Yii::$app->user->identity->id;
            $model->photo = $model->upload();

            if ($model->load($this->request->post()) && $model->save(false)) {
                return $this->redirect(['user/profile']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Car model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->user_id !== Yii::$app->user->identity->id) {
            return $this->goHome();
        }

        $model->file = UploadedFile::getInstance($model, 'file');
        $model->photo = $model->upload();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['user/profile']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Car model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['user/profile']);
    }

    /**
     * Finds the Car model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Car the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Car::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
