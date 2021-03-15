<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Service */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-view">

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

    <?php $img = $model->getImage() ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'id_department',
            'price',
            [
                'attribute' => 'photo',
                'value' => "<img src='{$img->getUrl('x130')}'>",
                'format' => 'html'
            ],
        ],
    ]) ?>

</div>
