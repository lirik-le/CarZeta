<?php

use yii\helpers\Url;

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
    <div class="cars">
        <h1>Список моих автомобилей</h1>
        <?php foreach ($cars as $car): ?>
            <div>
                <img src="<?= Yii::$app->user->identity->avatar ?>" alt="Аватарка" width="300px" height="225px">
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
                        <a href=""><img src="<?= Yii::$app->homeUrl ?>/web/bin.png" alt="Удалить" width="38"></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>