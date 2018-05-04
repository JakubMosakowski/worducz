<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Witaj <?= $user->username ?>,

Aby zresetować hasło, kliknij link poniżej:

<?= $resetLink ?>
