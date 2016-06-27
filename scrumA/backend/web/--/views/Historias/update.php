<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Historias */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Historias',
]) . $model->idhistoria;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idhistoria, 'url' => ['view', 'id' => $model->idhistoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="historias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
