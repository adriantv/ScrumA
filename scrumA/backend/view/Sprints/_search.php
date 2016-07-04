<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SprintsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprints-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'NombreSprint') ?>

    <?= $form->field($model, 'DescripcionSprint') ?>

    <?= $form->field($model, 'Historias') ?>

    <?= $form->field($model, 'F_inicio') ?>

    <?php // echo $form->field($model, 'F_final') ?>

    <?php // echo $form->field($model, 'NumeroDias') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Id_Historia') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
