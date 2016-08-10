<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\SignupForm;

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

            
            'NombreSprint',
            //'DescripcionSprint:ntext',
            'F_inicio',
            'F_final',
            // 'NumeroDias',
            // 'Status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{update}{delete}{add}{ver}{add3}',
                
                 'buttons'=>[
                      'add'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                            'title' => Yii::t('yii','Agregar Historias'),'id'=>'Id',
                        ]);
                    },
                    'add3'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-stats"></span>', $url, [
                            'title' => Yii::t('yii','Burn Douwn'),
                        ]);
                    }  ,
                       'ver'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-search"></span>', $url, [
                            'title' => Yii::t('yii','ver historias'),
                        ]);
                    }  
                 ],
                ],
        ],
    ]); ?>
</div>
