<?php ?>
<div class="profile">
    <div class="user">
        <div>
            <img src="<?= Yii::$app->user->identity->avatar ?>" alt="Аватарка" width="250px" height="250px">
            <div>
                <h2><?= Yii::$app->user->identity->username ?></h2>
                <p><?= Yii::$app->user->identity->lastname ?> <?= Yii::$app->user->identity->firstname ?></p>
                <p><?= Yii::$app->user->identity->email ?></p>
                <p><?= Yii::$app->user->identity->number ?></p>
            </div>
        </div>
    </div>
    <div class="cars">qwe</div>
</div>