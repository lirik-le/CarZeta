<?php

use yii\helpers\Url;

?>
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
                <a href="<?= Url::to(['car/notes']) ?>">
                    <button class="button green">Записи</button>
                </a>
                <a href="<?= Url::to(['car/update', 'id' => $car->id]) ?>">
                    <button class="button gray">Изменить</button>
                </a>
                <a href="<?= Url::to(['car/delete', 'id' => $car->id]) ?>" data-method="post"><img
                        src="<?= Yii::$app->homeUrl ?>/web/img/bin.png" alt="Удалить" width="30"></a>
            </div>
        </div>
    </div>
    </div>

<?php endforeach ?>