<?php
use miloschuman\highcharts\Highcharts;
use app\models\Sprints;
use app\models\Historias;
use yii\db\Expression;


$fechaInicio=  Sprints::findOne(['Id'=>$model_sprints->Id])->F_inicio;
$fechaFinal=  Sprints::findOne(['Id'=>$model_sprints->Id])->F_final;
$fechas=[];
$datos=[];
$fechaIni=strtotime($fechaInicio);
$fechaFi=strtotime($fechaFinal);
$iniciar=0;
for($i=$fechaIni; $i<=$fechaFi; $i+=86400){
    $fechas[$iniciar]=date("Y-m-d", $i);
    $iniciar++;
}

$pesoHistoria=  Historias::find()->where(['Id_Sprints'=>$model_sprints->Id])->all();
$totalPesoHistoria=0;
foreach ($pesoHistoria as $row):
    $totalPesoHistoria+=$row->PesoHistoria;
endforeach;

 $pesoActual=0;
$hiatoriasTerminandas=  Historias::find()->where(['Status'=>3])->all();
$iniciar=1;
$datos[0]=$totalPesoHistoria;
foreach ($hiatoriasTerminandas as $row2):
    for($i=0;$i<sizeof($fechas);$i++){
         
        if($fechas[$i]== $row2->fechafinal){
          $peso=(int) $row2->PesoHistoria;
           $pesoActual=$totalPesoHistoria-$peso;
            $datos[$iniciar]=$pesoActual;
            $totalPesoHistoria=$pesoActual;
        }else{
            $datos[$iniciar]=$totalPesoHistoria;
        }
        
    }
    
endforeach;


?>
<?= Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => $fechas
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => [
         ['name' => 'Peso de las historias', 'data' => $datos]
      ]
   ]
]);

 ?>
