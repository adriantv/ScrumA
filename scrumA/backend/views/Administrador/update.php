<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Administrador */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Administrador',
]) . $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Administradors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="administrador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
