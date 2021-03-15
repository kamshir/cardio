<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Специальности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speciality-index">

    <?= Alert::widget() ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать специальность', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id_speciality',
            'title',
            'id_service',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
