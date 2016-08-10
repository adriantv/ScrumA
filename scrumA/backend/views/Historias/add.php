<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Integrantes;

?>
<?php $form = ActiveForm::begin(); ?>
<?php echo $model->NombreHistoria;?>
 <?php $integrantes=  ArrayHelper::map(Integrantes::find()->all(),'Id','NombreCompleto')?>
 <?= $form->field($model, 'Id_Integrante')->dropDownList($integrantes)?>

     <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Agregar integrante'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>



  