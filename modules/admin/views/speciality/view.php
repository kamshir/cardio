<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Speciality */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="speciality-view">

    <?= Alert::widget() ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_speciality], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_speciality], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_speciality',
            'title',
            'id_service',
        ],
    ]) ?>

</div>
