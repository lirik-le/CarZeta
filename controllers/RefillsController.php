<?php

namespace app\controllers;

use app\models\Car;
use app\models\Refills;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RefillsController implements the CRUD actions for refills model.
 */
class RefillsController extends Controller
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
                    'only' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all refills models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Refills::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single refills model.
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

    /**
     * Creates a new refills model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Refills();
        $model->car_id = Yii::$app->request->getQueryParams()['car_id'];

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                if (Yii::$app->user->identity->role)
                    return $this->redirect(['view', 'id' => $model->id]);
                else
                    return $this->redirect(['car/notes', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing refills model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            if (Yii::$app->user->identity->role)
                return $this->redirect(['view', 'id' => $model->id]);
            else
                return $this->redirect(['car/notes', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing refills model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if (Yii::$app->user->identity->role)
            return $this->redirect(['view', 'id' => $model->id]);
        else
            return $this->redirect(['car/notes', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]);
    }

    /**
     * Finds the refills model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Refills the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Refills::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
