<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SprintsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sprints');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprints-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sprints'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'NombreSprint',
            'DescripcionSprint:ntext',
            'Historias',
            'F_inicio',
            // 'F_final',
            // 'NumeroDias',
            // 'Status',
            // 'Id_Historia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
