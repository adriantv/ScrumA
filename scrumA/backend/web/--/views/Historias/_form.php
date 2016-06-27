<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Historias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcionHistoria')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pesoHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idsprint')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
