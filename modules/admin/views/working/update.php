<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Working */

$this->title = 'Изменить день: ' . $model->id_working_day;
$this->params['breadcrumbs'][] = ['label' => 'Рабочие дни', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_working_day, 'url' => ['view', 'id' => $model->id_working_day]];
$this->params['breadcrumbs'][] = 'Изменить день';
?>
<div class="working-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
