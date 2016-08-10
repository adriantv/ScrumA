<?php

namespace backend\controllers;

use Yii;
use app\models\Historias;
use app\models\search\HistoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Integrantes;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use yii\db\Expression;
/**
 * HistoriasController implements the CRUD actions for Historias model.
 */
class HistoriasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>  AccessControl::className(),
                'only'=>['_form','_search','create','add','add2','index','update','view'],
                'rules'=>[
                    [
                      'actions'=>['_form','_search','create','add','add2','index','update','view'], 
                        'allow'=>true,
                        'roles'=>['@'],
                        'matchCallback'=>  function ($rule,$action){
                            return SignupForm::isIntegrante(Yii::$app->user->identity->id);
                        },
                                
                        ],
                                [
                      'actions'=>['_form','_search','create','add','add2','index','update','view'], 
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
     * Lists all Historias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistoriasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Historias model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function findModelDatos($id){
        $datos=  Historias::findOne($id);
        return $datos;
    }

        public function actionAdd($id) {
        $model = $this->findModel($id);
       // $model->Id_Integrante=$id_inte;
        if ($model->load(Yii::$app->request->post()) ) {
            
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('add', [
                'model' => $model,
        ]);
        }         
 
    
    }
    
       public function actionAdd2($id) {
        $model = $this->findModel($id);
       // $model->Id_Integrante=$id_inte;
        if ($model->load(Yii::$app->request->post()) ) {
            $estado=$model->Status;
            if($estado == 3){
                $model->fechafinal=new Expression('NOW()');
            }
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('add2', [
                'model' => $model,
            ]);
        }
 
    
    }
    
    public function actionAgregar($id) {
        
        $model = $this->findModel($id);
      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
        
    }


        /**
     * Creates a new Historias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Historias();
        //$model->Status=1;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Historias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $model->NombreHistoria=$this->findModelDatos($id)->NombreHistoria;
        $model->NumeroHistoria=$this->findModelDatos($id)->NumeroHistoria;
        $model->DescripcionHistoria=$this->findModelDatos($id)->DescripcionHistoria;
        $model->PesoHistoria=$this->findModelDatos($id)->PesoHistoria;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Historias model.
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
     * Finds the Historias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Historias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Historias::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
