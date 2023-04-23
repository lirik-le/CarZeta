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
<?php if (Yii::$app->request->url === '/CarZeta/site/index'): ?>
    <img src="CarZeta/../../web/index-blur.jpg" class="index-img h-100 w-100" alt="Фон">
<?php endif ?>
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="h-100">
<?php $this->beginBody() ?>

<header>
    <?php if (Yii::$app->request->url === '/CarZeta/site/index'): ?>
    <img src="CarZeta/../../web/carzeta-logo-dark.png" width="180px">
    <?php else: ?>
    <img src="CarZeta/../../web/carzeta-logo-light.png" width="180px">
    <?php endif; ?>
    <div>
        <a href="">Войти</a>
        <a href="">Зарегистрироваться</a>
    </div>
</header>

<main>
    <?= $content ?>
</main>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
