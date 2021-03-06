<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\models\Konto;
use common\components\Constants;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=1024">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            ''
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Rejestracja', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Logowanie', 'url' => ['/site/login']];
    } else {

        $id = Yii::$app->user->identity->getId();
        $konto = Konto::findOne($id);
        if ($konto->rola_id !== Constants::USER_ID) {
            $menuItems[] = ['label' => 'Zestawy', 'url' => ['/zestaw']];
            $menuItems[] = ['label' => 'Dodaj zestaw publiczny', 'url' => ['zestaw/create']];
        }
        $menuItems[] = ['label' => 'Dodaj zestaw prywatny', 'url' => ['/zestaw/user-zestaw']];
        $menuItems[] = ['label' => 'Twoje konto', 'url' => ['/konto/view', 'id' => Yii::$app->user->identity->getId()]];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Wyloguj (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <img id="main-image" src="/uploads/others/mainImageSmaller.jpg" class="img-responsive" alt="Main image" style="width: 100%">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">Jakub Mosakowski &copy; <?= date('Y') ?></p>

         <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
