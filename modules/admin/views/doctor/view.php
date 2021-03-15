<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Doctor */

$this->title = $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name;
$this->params['breadcrumbs'][] = ['label' => 'Врачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="doctor-view">

    <?= Alert::widget() ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $img = $model->getImage(); ?> 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'middle_name',
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x130')}'>",
                'format' => 'html'
            ],
            'phone',
            'email',
            [
                'attribute' => 'description',
                'format' => 'html'
            ],
            'quotes',
            'id_speciality',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return $data->status ? '<span class="text-warning">Руководство</span>' : '<span class="text-info">Врач</span>';
                },
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
