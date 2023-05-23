<?php

namespace app\controllers;

use app\models\ChangePasswordForm;
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

    public function actionChangeAvatar()
    {
        $model = Yii::$app->user->identity;

        $model->file = UploadedFile::getInstance($model, 'file');
        $model->avatar = $model->upload();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false))
            return $this->redirect(['profile', 'id' => $model->id]);

        return $this->render('changeAvatar', [
            'model' => $model,
        ]);
    }

    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = Yii::$app->user->identity;
            $user->password = Yii::$app->security->generatePasswordHash($model->new_password);
            $user->save(false);
            return $this->redirect(['user/profile']);
        }

        return $this->render('changePassword', [
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
