<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KontoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Twoje zestawy';
$this->params['breadcrumbs'][] = ['label' => Yii::$app->user->identity->username, 'url' => ['view', 'id' => Yii::$app->user->identity->getId()]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="konto-user-zestawy">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Nazwa podkategorii',
                'attribute' => 'podkategoria.nazwa'
            ],
            'nazwa',
            'zestaw:ntext',
            'ilosc_slowek',
            'data_dodania',
            'data_edycji',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                            ['title' => Yii::t('app', 'Aktualizuj')]);
                    },

                    'delete' => function ($url, $model) {
                        $url = Url::to(['konto/delete-zestawy', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Usuwanie',
                            'data-confirm' => Yii::t('yii', 'Na pewno chcesz to usunąć?'),
                            'data-method' => 'post',
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action == 'update') {
                        $url = '/konto/update-zestawy?id=' . $model->id;
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
</div>
