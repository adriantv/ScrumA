<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\HistoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Historias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Historias'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'NombreHistoria',
            'NumeroHistoria',
            'PesoHistoria',
           

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{update}{delete}{add}{add2}',
                'buttons'=>[
                    'add'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                            'title' => Yii::t('yii','agregar integrante'),
                        ]);
                    },
                    'add2'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-refresh"></span>', $url, [
                            'title' => Yii::t('yii','cambiar status'),
                        ]);
                    }
                    ]
                ],
                            ],
                        
    ]); ?>
</div>
