<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;

if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}

AppAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<?php if (Yii::$app->request->url === "/CarZeta/site/index" or Yii::$app->request->url === "/CarZeta/"): ?>
    <img src="<?= Yii::$app->homeUrl ?>/web/index-blur.jpg" class="index-img h-100 w-100">
<?php endif ?>
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="h-100">
<?php $this->beginBody() ?>

<header>
    <?php if (Yii::$app->request->url === "/CarZeta/site/index" or Yii::$app->request->url === "/CarZeta/"): ?>
        <a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
            <img src="<?= Yii::$app->homeUrl ?>/web/carzeta-logo-dark.png" width="180px">
        </a>
    <?php else: ?>
        <a href="<?= Yii::$app->urlManager->createUrl('/') ?>">
            <img src="<?= Yii::$app->homeUrl ?>/web/carzeta-logo-light.png" width="180px">
        </a>
    <?php endif ?>
    <div>
        <?php if (Yii::$app->user->isGuest): ?>
            <a href="<?= Yii::$app->urlManager->createUrl('site/login') ?>">Войти</a>
            <a href="<?= Yii::$app->urlManager->createUrl('site/register') ?>">Зарегистрироваться</a>
        <?php else: ?>
            <?= Html::a("Выход", ['site/logout'], [
                    'data' => [
                        'method' => 'post'
                    ],
                    ['class' => 'white text-center']
                ]
            );?>
        <?php endif ?>
    </div>
</header>

<main>
    <?= $content ?>
</main>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
