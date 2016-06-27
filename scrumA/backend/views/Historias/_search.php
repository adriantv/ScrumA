<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\HistoriasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombreHistoria') ?>

    <?= $form->field($model, 'numeroHistoria') ?>

    <?= $form->field($model, 'descripcionHistoria') ?>

    <?= $form->field($model, 'pesoHistoria') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'idSprint') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
