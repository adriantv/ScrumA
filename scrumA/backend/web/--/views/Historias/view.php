<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Historias */

$this->title = $model->idhistoria;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idhistoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idhistoria], [
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
            'idhistoria',
            'nombreHistoria',
            'numeroHistoria',
            'descripcionHistoria:ntext',
            'pesoHistoria',
            'status',
            'idsprint',
        ],
    ]) ?>

</div>
