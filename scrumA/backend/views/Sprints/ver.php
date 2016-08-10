<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Historias;




?>
<br>
<br>
<table class="table table-striped">
    <tr><th>Nombre de la Histoia</th></tr>
<?php foreach ($model_datos as $row): ?>
    <tr>
        <td> <?= $row ->NombreHistoria;?></td>
    
    </tr>
<?php endforeach;?>

</table>

  