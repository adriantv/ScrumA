<?php

namespace backend\controllers;

use Yii;
use app\models\Sprints;
use app\models\search\SprintsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Historias;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
/**
 * SprintsController implements the CRUD actions for Sprints model.
 */
class SprintsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>  AccessControl::className(),
                'only'=>['_form','_search','create','add','graf','index','update','view'],
                'rules'=>[
                     [
                      'actions'=>['_form','_search','create','add','graf','index','update','view'], 
                        'allow'=>true,
                        'roles'=>['@'],
                        'matchCallback'=>  function ($rule,$action){
                            return SignupForm::isIntegrante(Yii::$app->user->identity->id);
                        },
                        ],
                    [
                      'actions'=>['_form','_search','create','add','graf','index','update','view'], 
                        'allow'=>true,
                        'roles'=>['@'],
                        'matchCallback'=>  function ($rule,$action){
                            return SignupForm::isAdmin(Yii::$app->user->identity->id);
                        },
                        ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sprints models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SprintsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sprints model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    public function actionAdd($id) {
        $model = $this->findModel($id);
        $model_historias=new Historias();
        
        if ($model_historias->load(Yii::$app->request->post())) {
            $this->actionUpdateHistorias($model_historias->Id_Sprints,$id);
            return $this->redirect(['index']);
        }  else {
            return $this->render('add', [
                'model' =>$model,
                'model_historias'=>$model_historias,
            ]);
        }
    }
       public function actionAdd3($id) {
           $model_sprints=new Sprints();
           $model_sprints->Id=$id;
      
           return $this->render('graf',[
               'model_sprints'=>$model_sprints,
           ]);
    }
    
    public function actionVer($id) 
        
  {
       $datos = Historias::find()->where(['Id_Sprints' => $id])->all();
       
       return $this->render('ver',[
               'model_datos'=>$datos,
           ]);
      
  } 
    
        

        public function actionUpdateHistorias($id,$id_sprints)
    {

        $model = $this->findModelHistorias($id);
        $model->NombreHistoria=$this->findModelDatos($id)->NombreHistoria;
        $model->NumeroHistoria=$this->findModelDatos($id)->NumeroHistoria;
        $model->DescripcionHistoria=$this->findModelDatos($id)->DescripcionHistoria;
        $model->PesoHistoria=$this->findModelDatos($id)->PesoHistoria;
        $model->Status=$this->findModelDatos($id)->Status;
        $model->Id_Integrante=$this->findModelDatos($id)->Id_Integrante;
        $model->Id_Sprints=$id_sprints;
        $model->save();
        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
           // return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    public function findModelDatos($id){
        $datos=  Historias::findOne($id);
        return $datos;
    }
    
    /**
     * Creates a new Sprints model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sprints();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sprints model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function obtenerHistoria($id){
        $historia=Historias::findOne($id);
        return $historia;
    }
    
    public function actionCambiar($id)
    {
        $model_s=  Sprints::findOne($id);
        $model_s->load(Yii::$app->request->post());
        $model = $this->findModelHistorias($model_s->Id);
        $model->NombreHistoria=$this->obtenerHistoria($model_s->Id)->NombreHistoria;
        $model->NumeroHistoria=$this->obtenerHistoria($model_s->Id)->NumeroHistoria;
        $model->DescripcionHistoria=$this->obtenerHistoria($model_s->Id)->DescripcionHistoria;
        $model->PesoHistoria=$this->obtenerHistoria($model_s->Id)->PesoHistoria;
        $model->Id_Integrante=$this->obtenerHistoria($model_s->Id)->Id_Integrante;
        
        $model->Id=$model_s->Id_Sprints;
        $model->save();
       /* if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Deletes an existing Sprints model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sprints model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sprints the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sprints::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     protected function findModelHistorias($id)
    {
        if (($model =Historias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
