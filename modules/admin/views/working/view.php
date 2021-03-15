<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Working */

$this->title = $model->day . ' : ' . $doctor->last_name . ' ' . mb_substr($doctor->first_name, 0, 1) . '.' . mb_substr($doctor->middle_name, 0, 1);
$this->params['breadcrumbs'][] = ['label' => 'Рабочие дни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="working-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_working_day], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_working_day], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить день?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_working_day',
            'day',
            'work_from',
            'work_to',
            'id'
        ],
    ]) ?>

</div>
