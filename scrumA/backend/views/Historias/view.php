<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Integrantes;

/* @var $this yii\web\View */
/* @var $model app\models\Historias */

$this->title = $model->NombreHistoria;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $historia=  \app\models\Historias::findOne($model->Id);?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NombreHistoria',
            'NumeroHistoria',
            'DescripcionHistoria:ntext',
            'PesoHistoria',
            'Status',
            [
                'attribute'=>'Nombre del Integrante',
                'value'=> $model->Id_Integrante ? Integrantes::findOne($model->Id_Integrante)->NombreCompleto:"",
            ],
        ],
    ]) ?>

</div>
