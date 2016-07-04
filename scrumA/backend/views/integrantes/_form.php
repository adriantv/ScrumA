<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Integrantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integrantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreCompleto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model_user, 'username')->textInput() ?>
    
    <?= $form->field($model_user, 'password_hash')->passwordInput() ?>
    
    <?= $form->field($model_user, 'email')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
