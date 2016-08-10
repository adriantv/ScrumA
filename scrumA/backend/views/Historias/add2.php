<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
 <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'Status')->dropDownList($array = array(
    ""   => "",
    "1"  => "Por Hacer",
    "2"  => "En proceso",
    "3"  => "Echo",
)); ?>

 <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Agregar status'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
