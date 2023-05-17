<?php

use yii\helpers\Url;

$this->title = $user->username;
?>

<div class="profile">
    <div class="users">
        <div>
            <img src="<?= $user->avatar ?>" alt="Аватарка" width="250px" height="250px">
            <div>
                <h2><?= $user->username ?></h2>
                <p><?= $user->lastname ?> <?= Yii::$app->user->identity->firstname ?></p>
                <p><?= $user->email ?></p>
                <p><?= $user->number ?></p>
                <a href="<?= Url::to(['user/update', 'id' => $user->id]) ?>">
                    <button class="button green">Изменить</button>
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