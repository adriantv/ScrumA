<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Sprints */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprints-form">

    <?php $form = ActiveForm::begin(); ?>
   

    <?= $form->field($model, 'NombreSprint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionSprint')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model,'F_inicio')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <?php echo $form->field($model,'F_final')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>



    <?= $form->field($model, 'Status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
