<?php

namespace backend\controllers;

use Yii;
use app\models\Administrador;
use app\models\Search\AdministradorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
/**
 * AdministradorController implements the CRUD actions for Administrador model.
 */
class AdministradorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>  AccessControl::className(),
                'only'=>['_form','_search','create','graf','index','update','view'],
                'rules'=>[
                    [
                      'actions'=>['_form','_search','create','graf','index','update','view'], 
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
     * Lists all Administrador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdministradorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Administrador model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Administrador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_user=new \frontend\models\SignupForm();
        $model = new Administrador();
        $model_user->isNewRecord = true;
        if($model_user->load(Yii::$app->request->post())){
            $model_user->rol=1;
            $model->Id_user=$model_user->signup();
            
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        
        } else {
            return $this->render('create', [
                'model' => $model,
                'model_user'=>$model_user,
            ]);
        }
    }

    /**
     * Updates an existing Administrador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_user=new \frontend\models\SignupForm();
        $model_user->isNewRecord=true;
        $model_user->obtener($this->findModel($id)->Id_user);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_user->load(Yii::$app->request->post())&& $model_user->modificarUser($this->findModel($id)->Id_user);
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model_user'=>$model_user,
            ]);
        }
    }

    /**
     * Deletes an existing Administrador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $id_user=$this->findModel($id)->Id_user;
        $this->findModel($id)->delete();
        $user=new \frontend\models\SignupForm();
       $user->obtenerDatos($id_user);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Administrador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Administrador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Administrador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGraf() {
        //return 'paso';
        return $this->render('graf');
    }
}
