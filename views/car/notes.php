<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Записи';

?>

<div class="notes">
    <div>
        <div class="notes-button">
            <p>Добавить:</p>
            <a href="<?= Url::to(['incomes/create', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]) ?>">
                <button class="button green">Доход</button>
            </a>
            <a href="<?= Url::to(['expenditures/create', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]) ?>">
                <button class="button red">Расход</button>
            </a>
            <a href="<?= Url::to(['services/create', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]) ?>">
                <button class="button gray">Сервис</button>
            </a>
            <a href="<?= Url::to(['refills/create', 'car_id' => Yii::$app->request->getQueryParams()['car_id']]) ?>">
                <button class="button yellow">Заправка</button>
            </a>
        </div>
        <div class="menu">
            <div>
                <?= $sort->link('date', ['class' => 'sorts']); ?> <?= $sort->link('amount', ['class' => 'sorts']); ?>
            </div>
            <?= $this->render('_filter', ['car_id' => Yii::$app->request->getQueryParams()['car_id']]) ?>
        </div>
    </div>

    <div class="notes-list">
        <?php
        if (!empty($notes)):
        foreach ($notes as $note):
            ?>
            <div class="note">
                <div>
                    <img class="note-img" src="<?= Yii::$app->homeUrl ?>/web/img/<?php
                    if (isset($note->type_of_expenditures))
                        echo 'expenditure';
                    else if (isset($note->type_of_incomes))
                        echo 'income';
                    else if (isset($note->type_of_services))
                        echo 'service';
                    else
                        echo 'refill';
                    ?>.png" alt="Доход">
                </div>
                <div class="note-info">
                    <div class="note-header">
                        <p>
                            <?php
                            if (isset($note->type_of_expenditures))
                                echo $note->type_of_expenditures;
                            else if (isset($note->type_of_incomes))
                                echo $note->type_of_incomes;
                            else if (isset($note->type_of_services))
                                echo $note->type_of_services;
                            else
                                echo 'Заправка';
                            ?>
                        </p>
                        <div>
                            <p><?= $note->date ?></p>
                            <p><?= $note->amount ?> рублей</p>
                        </div>
                    </div>
                    <div class="note-footer">
                        <div>
                            <?php
                            if (isset($note->description)) {
                                echo '<p>' . $note->description . '</p>';
                            } else {
                                echo '<p class="fuel">' . $note->fuel->fuel . '</p>' . '<p>' . $note->liters . ' литра' . '</p>';
                            }
                            ?>
                        </div>
                        <div>
                            <a href="<?php
                            if (isset($note->type_of_expenditures))
                                echo Url::to(["expenditures/update", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            else if (isset($note->type_of_incomes))
                                echo Url::to(["incomes/update", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            else if (isset($note->type_of_services))
                                echo Url::to(["services/update", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            else
                                echo Url::to(["refills/update", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            ?>">
                                <button class="button green">Изменить</button>
                            </a>
                            <a href="<?php
                            if (isset($note->type_of_expenditures))
                                echo Url::to(["expenditures/delete", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            else if (isset($note->type_of_incomes))
                                echo Url::to(["incomes/delete", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            else if (isset($note->type_of_services))
                                echo Url::to(["services/delete", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            else
                                echo Url::to(["refills/delete", 'car_id' => Yii::$app->request->getQueryParams()['car_id'], 'id' => $note->id]);
                            ?>" data-method="post">
                                <button class="button red">Удалить</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        else:
        ?>
        <div>
            <p>Нет записей</p>
        </div>
        <?php
        endif;
        ?>

        <div class="pages">
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>
</div>
