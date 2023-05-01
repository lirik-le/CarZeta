<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="form-box">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{input}\n{error}",
            'inputOptions' => ['class' => 'input-form'],
            'errorOptions' => ['class' => 'input-error'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=>'Логин']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль']) ?>

    <div class="form-group">
        <div>
            <?= Html::submitButton('Войти', ['class' => 'button-green', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
