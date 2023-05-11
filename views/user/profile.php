<?php

use yii\helpers\Url;

$this->title = Yii::$app->user->identity->username;
?>
<div class="profile">
    <div class="users">
        <div>
            <img src="<?= Yii::$app->user->identity->avatar ?>" alt="Аватарка" width="250px" height="250px">
            <div>
                <h2><?= Yii::$app->user->identity->username ?></h2>
                <p><?= Yii::$app->user->identity->lastname ?> <?= Yii::$app->user->identity->firstname ?></p>
                <p><?= Yii::$app->user->identity->email ?></p>
                <p><?= Yii::$app->user->identity->number ?></p>
                <a href="<?= Url::to(['user/update', 'id' => Yii::$app->user->identity->id]) ?>">
                    <button class="button green">Изменить</button>
                </a>
            </div>
        </div>
    </div>
    <?php if (!Yii::$app->user->identity->role): ?>
    <div class="cars">
        <div>
            <h1>Список моих автомобилей</h1>
            <a href="<?= Url::to(['car/create']) ?>" data-method="post">
                <button class="button green">Добавить</button>
            </a>
        </div>
        <?php foreach ($cars as $car): ?>
            <div class="car">
                <img src="<?= $car->photo ?>" alt="Фотография" width="300px" height="225px">
                <div>
                    <h2><?= $car->name ?></h2>
                    <p><?= $car->brand ?> <?= $car->model ?></p>
                    <p><?= $car->number ?></p>
                    <p><?= $car->year ?> год</p>
                    <p><?= $car->mileage ?></p>
                    <div>
                        <a href="<?= Url::to(['']) ?>">
                            <button class="button green">Записи</button>
                        </a>
                        <a href="<?= Url::to(['car/update', 'id' => $car->id]) ?>">
                            <button class="button gray">Изменить</button>
                        </a>
                        <a href="<?= Url::to(['car/delete', 'id' => $car->id])?>" data-method="post"><img src="<?= Yii::$app->homeUrl ?>/web/img/bin.png" alt="Удалить" width="30"></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <?php else: ?>
    <div class="cars">
        <h1 class="adm">Админ панель</h1>
        <a href="<?= Url::to(['car/create']) ?>" data-method="post">
            <button class="button green">Добавить</button>
        </a>
    </div>
    <?php endif ?>
</div>