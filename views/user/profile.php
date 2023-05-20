<?php

use yii\helpers\Url;

$this->title = $user->username;
?>

<div class="profile">
    <div class="users">
        <div>
            <div class="avatar">
                <img src="<?= $user->avatar ?>" alt="Аватарка" width="250px" height="250px">
                <a href="<?= Url::to(['user/avatar', 'id' => $user->id]) ?>">
                    <img class="gear" src="<?= Yii::$app->homeUrl ?>web/img/gear.png" alt="Сменить" width="33" height="33">
                </a>
            </div>
            <div>
                <h2><?= $user->username ?></h2>
                <p><?= $user->lastname ?> <?= Yii::$app->user->identity->firstname ?></p>
                <p><?= $user->email ?></p>
                <p><?= $user->number ?></p>
                <a href="<?= Url::to(['user/update', 'id' => $user->id]) ?>">
                    <button class="button green">Изменить</button>
                </a>
                <a href="<?= Url::to(['user/password', 'id' => $user->id]) ?>">
                    <button class="button gray">Смена пароля</button>
                </a>
            </div>
        </div>
    </div>

    <?php if (!$user->role): ?>
        <?= $this->render('_cars', [
            'cars' => $cars,
        ]) ?>
    <?php else: ?>
        <?= $this->render('_admin') ?>
    <?php endif ?>
</div>