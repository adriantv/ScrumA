<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sprints */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sprints',
]) . $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sprints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sprints-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
