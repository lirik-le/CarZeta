<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                    'only' => ['index', 'view', 'delete', 'profile', 'update'],
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function () {
                                return Yii::$app->user->identity->role;
                            }
                        ],
                        [
                            'actions' => ['profile'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function () {
                                if ((Yii::$app->request->getQueryParam('id') == Yii::$app->user->identity->id) || Yii::$app->user->identity->role)
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

    public function actionProfile()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $cars = $user->cars;

        return $this->render('profile', ['user' => $user, 'cars' => $cars]);
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false))
            return $this->redirect(['profile', 'id' => $model->id]);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAvatar($id)
    {
        $model = $this->findModel($id);

        $model->file = UploadedFile::getInstance($model, 'file');
        $model->avatar = $model->upload();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false))
            return $this->redirect(['profile', 'id' => $model->id]);

        return $this->render('avatar', [
            'model' => $model,
        ]);
    }

    public function actionPassword($id)
    {
        $model = $this->findModel($id);
        $model->password = '';

        if ($model->load(Yii::$app->request->post())){
            var_dump($model->validate());
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['profile', 'id' => $model->id]);
            }
        }

        if ($model->load(Yii::$app->request->post())){
            if ($this->request->isPost && $model->validate()){
                $model->password = md5($model->password);
                $model->save();
                return $this->redirect(['profile', 'id' => $model->id]);
            }
        }

        return $this->render('password', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null)
            return $model;

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
