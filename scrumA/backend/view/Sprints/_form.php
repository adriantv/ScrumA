<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sprints */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprints-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreSprint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionSprint')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Historias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'F_inicio')->textInput() ?>

    <?= $form->field($model, 'F_final')->textInput() ?>

    <?= $form->field($model, 'NumeroDias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Id_Historia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
