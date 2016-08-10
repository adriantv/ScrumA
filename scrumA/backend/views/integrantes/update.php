<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Integrantes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Integrantes',
]) . $model->Id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="integrantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_user'=>$model_user,
    ]) ?>

</div>
