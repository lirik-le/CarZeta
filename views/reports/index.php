<?php

use yii\helpers\Url;

?>

<div class="reports">
    <h1>Статистика</h1>
    <div>
        <div class="reports-menu">
            <div>
                <a class="reports-link" href="<?= Url::to("?car_id=$car_id") ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/stat.png" alt="" width="50" height="50">
                    <span class="reports-stat">Полная статистика</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to("?car_id=$car_id&category=refills") ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-refill.png" alt="" width="50" height="50">
                    <span class="reports-refill">Заправки</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to("?car_id=$car_id&category=incomes") ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-income.png" alt="" width="50" height="50">
                    <span class="reports-income">Доходы</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to("?car_id=$car_id&category=expenditures") ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-expenditure.png" alt="" width="50" height="50">
                    <span class="reports-expenditure">Расходы</span>
                </a>
            </div>
            <div>
                <a class="reports-link" href="<?= Url::to("?car_id=$car_id&category=services") ?>">
                    <img src="<?= Yii::$app->homeUrl ?>/web/img/report-service.png" alt="" width="50" height="50">
                    <span class="reports-service">Сервисы</span>
                </a>
            </div>
        </div>
        <div class="stat">
            <div>
                <a href="<?= Url::to("?car_id=$car_id&category=$category&date=-1 months") ?>">За месяц</a> |
                <a href="<?= Url::to("?car_id=$car_id&category=$category&date=-3 months") ?>">За 3 месяца</a> |
                <a href="<?= Url::to("?car_id=$car_id&category=$category&date=-6 months") ?>">За 6 месяцев</a> |
                <a href="<?= Url::to("?car_id=$car_id&category=$category&date=-12 months") ?>">За год</a> |
                <a href="<?= Url::to("?car_id=$car_id&category=$category") ?>">За все время</a>
            </div>
            <?php
            switch ($category) {
                case 'refills':
                    echo $this->render('_refills', [
                        'sum' => $sum,
                        'liters' => $liters,
                        'min' => $min,
                        'max' => $max,
                    ]);
                    break;
                case 'incomes':
                    echo $this->render('_incomes', [
                        'sum' => $sum,
                        'min' => $min,
                        'max' => $max,
                    ]);
                    break;
                case 'expenditures':
                    echo $this->render('_expenditures', [
                        'sum' => $sum,
                        'min' => $min,
                        'max' => $max,
                    ]);
                    break;
                case 'services':
                    echo $this->render('_services', [
                        'sum' => $sum,
                        'min' => $min,
                        'max' => $max,
                    ]);
                    break;
                default:
                    ?>
                    <div>
                        <h2 class="allH1">Всего</h2>
                        <div class="stat-inner">
                            <div>
                                <div>
                                    <h2><?= $sum ?> рублей</h2>
                                    <p>Всего</p>
                                </div>
                                <div>
                                    <h2><?= $liters ?> литров</h2>
                                    <p>Всего</p>
                                </div>
                            </div>
                            <div>
                                <?php if (!empty($min) || !empty($max)): ?>
                                    <div>
                                        <h2><?= $min['amount'] ?> рублей</h2>
                                        <p>Наименьшая сумма</p>
                                        <p>
                                            <?php
                                            if (isset($min['type_of_incomes']))
                                                echo $min['type_of_incomes'];
                                            elseif (isset($min['type_of_expenditures']))
                                                echo $min['type_of_expenditures'];
                                            elseif (isset($min['type_of_services']))
                                                echo $min['type_of_services'];
                                            else
                                                echo $min['liters'];
                                            ?>
                                        </p>
                                        <p><?= $min['date'] ?></p>
                                    </div>
                                    <div>
                                        <h2><?= $max['amount'] ?> рублей</h2>
                                        <p>Наибольшая сумма</p>
                                        <p>
                                            <?php
                                            if (isset($max['type_of_incomes']))
                                                echo $max['type_of_incomes'];
                                            elseif (isset($max['type_of_expenditures']))
                                                echo $max['type_of_expenditures'];
                                            elseif (isset($max['type_of_services']))
                                                echo $max['type_of_services'];
                                            else
                                                echo $max['liters'];
                                            ?>
                                        </p>
                                        <p><?= $max['date'] ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php
            }
            ?>

        </div>
    </div>
</div>