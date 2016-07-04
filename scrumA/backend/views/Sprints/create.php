<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sprints */

$this->title = Yii::t('app', 'Create Sprints');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sprints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprints-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
