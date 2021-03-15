<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Врачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-index">

    <?= Alert::widget() ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить врача', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'first_name',
            'last_name',
            'middle_name',
            [
                'attribute' => 'description',
                'format' => 'html'
            ],
            'quotes',
            'phone',
            'email',
            'id_speciality',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->status ? '<span class="text-warning">Руководство</span>' : '<span class="text-info">Врач</span>';
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
