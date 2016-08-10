<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Integrantes;

/* @var $this yii\web\View */
/* @var $model app\models\Historias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumeroHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionHistoria')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PesoHistoria')->textInput(['maxlength' => true]) ?>
    
    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
