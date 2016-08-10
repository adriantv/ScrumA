<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sprints */

$this->title = $model->NombreSprint;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sprints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprints-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'NombreSprint',
            'DescripcionSprint:ntext',
            'F_inicio',
            'F_final',
            
        ],
    ]) ?>

</div>
