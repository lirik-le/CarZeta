<?php

namespace app\controllers;

use app\models\Car;
use app\models\Expenditures;
use app\models\Incomes;
use app\models\Refills;
use app\models\Services;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;
use yii\data\Sort;
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
                            'actions' => ['create', 'delete'],
                            'allow' => true,
                            'roles' => ['@']
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function () {
                                $user_id = Car::findOne(['id' => Yii::$app->request->getQueryParam('id')])->user_id;
                                if (($user_id == Yii::$app->user->identity->id) || Yii::$app->user->identity->role)
                                    return true;
                            }
                        ],
                        [
                            'actions' => ['notes'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function () {
                                $user_id = Car::findOne(['id' => Yii::$app->request->getQueryParam('car_id')])->user_id;
                                if ($user_id == Yii::$app->user->identity->id)
                                    return true;
                            }
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

        switch (Yii::$app->request->getQueryParam('category')) {
            case 'refills':
                if (Yii::$app->request->getQueryParam('date'))
                    $refills = Refills::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                else
                    $refills = Refills::findAll(['car_id' => $car->id]);
                $notes = $refills;
                break;
            case 'incomes':
                if (Yii::$app->request->getQueryParam('date'))
                    $incomes = Incomes::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                else
                    $incomes = Incomes::findAll(['car_id' => $car->id]);
                $notes = $incomes;
                break;
            case 'expenditures':
                if (Yii::$app->request->getQueryParam('date'))
                    $expenditures = Expenditures::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                else
                    $expenditures = Expenditures::findAll(['car_id' => $car->id]);
                $notes = $expenditures;
                break;
            case 'services':
                if (Yii::$app->request->getQueryParam('date'))
                    $services = Services::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                else
                    $services = Services::findAll(['car_id' => $car->id]);
                $notes = $services;
                break;
            default:
                if (Yii::$app->request->getQueryParam('date')) {
                    $refills = Refills::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                    $incomes = Incomes::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                    $expenditures = Expenditures::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                    $services = Services::findAll(['car_id' => $car->id, 'date' => Yii::$app->request->getQueryParam('date')]);
                }
                else {
                    $refills = Refills::findAll(['car_id' => $car->id]);
                    $incomes = Incomes::findAll(['car_id' => $car->id]);
                    $expenditures = Expenditures::findAll(['car_id' => $car->id]);
                    $services = Services::findAll(['car_id' => $car->id]);
                }
                $notes = array_merge($expenditures, $incomes, $refills, $services);
        }

        ArrayHelper::multisort($notes, ['date'], [SORT_DESC]);

        $pagination = new Pagination([
            'totalCount' => count($notes),
            'pageSize' => 10,
        ]);

        $sort = new Sort([
            'attributes' => [
                'date' => ['label' => 'Дата'],
                'amount' => ['label' => 'Цена']
            ],
        ]);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $notes,
            'pagination' => [
                'pageSize' => $pagination->pageSize,
                'page' => $pagination->getPage(),
                'pageSizeParam' => false,
                'forcePageParam' => false
            ],
        ]);

        $dataProvider->setSort($sort);

        $notes = $dataProvider->getModels();
        $pages = $dataProvider->getPagination();

        return $this->render('notes', ['notes' => $notes, 'pages' => $pages, 'sort' => $sort]);
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

    public function actionPhoto($id)
    {
        $model = $this->findModel($id);

        $model->file = UploadedFile::getInstance($model, 'file');
        $model->photo = $model->upload();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false))
            return $this->redirect(['user/profile']);

        return $this->render('photo', [
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
