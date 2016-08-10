<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Historias;
?>


<?php $form = ActiveForm::begin(); ?>
<?php echo $model->NombreSprint;?>
 <?php $historias=  ArrayHelper::map(Historias::find()->where(['Id_Sprints'=>NULL])->all(),'Id','NombreHistoria')?>
    <?= $form->field($model_historias, 'Id_Sprints')->dropDownList($historias) ?>

 <div class="form-group">
         <?= Html::submitButton($model_historias->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model_historias->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>





