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
    <?php $integrantes=  ArrayHelper::map(Integrantes::find()->all(),'Id','NombreCompleto')?>

    <?= $form->field($model, 'NombreHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumeroHistoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionHistoria')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PesoHistoria')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'Id_Integrante')->dropDownList($integrantes) ?>
    
         <?= $form->field($model, 'Status')->dropDownList($array = array(
    ""   => "",
    "1"  => "Por Hacer",
    "2"  => "En proceso",
    "3"  => "Echo",
)); ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
