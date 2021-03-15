<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Working */

$this->title = 'Добавить день';
$this->params['breadcrumbs'][] = ['label' => 'Рабочие дни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
