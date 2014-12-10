<?php

namespace app\controllers;

use Yii;
use app\models\Gl2006idid;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Gl2006ididController implements the CRUD actions for Gl2006idid model.
 */
class Gl2006ididController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionEqu(){
        set_time_limit(0);
        $model = Gl2006idid::find()->all();
        $i=1;
        foreach ($model as $a)
        {
            $model2 = Gl2006idid::find()->where('GL2006ID_HolderID=:id', array(':id'=>$a['GL2006ID_HolderID']))->all();
            foreach ($model2 as $b)
            {                
                $customer = Gl2006idid::findOne($b['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2006'.$i;
                $customer->save();
                echo $b['GL2006ID_HolderID'].'-'.$b['HD2006ID_HolderID'].'-'.$b['id']."-".$customer->NValue."<br>";
                }
            }
            $model3 = Gl2006idid::find()->where('HD2006ID_HolderID=:id', array(':id'=>$a['GL2006ID_HolderID']))->all();
            foreach ($model3 as $c)
            {
                $customer = Gl2006idid::findOne($c['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2006'.$i;
                $customer->save();
                echo $c['GL2006ID_HolderID'].'-'.$c['HD2006ID_HolderID'].'-'.$c['id']."-".$customer->NValue."<br>";
                }
            }
            $model4 = Gl2006idid::find()->where('GL2006ID_HolderID=:id', array(':id'=>$a['HD2006ID_HolderID']))->all();
            foreach ($model4 as $d)
            {
                $customer = Gl2006idid::findOne($d['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2006'.$i;
                $customer->save();
                echo $d['GL2006ID_HolderID'].'-'.$d['HD2006ID_HolderID'].'-'.$d['id']."-".$customer->NValue."<br>";
                }
            }
            $model5 = Gl2006idid::find()->where('HD2006ID_HolderID=:id', array(':id'=>$a['HD2006ID_HolderID']))->all();
            foreach ($model5 as $e)
            {
                $customer = Gl2006idid::findOne($e['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2006'.$i;
                $customer->save();
                echo $e['GL2006ID_HolderID'].'-'.$e['HD2006ID_HolderID'].'-'.$e['id']."-".$customer->NValue."<br>";
                }
            }
            $i++;
        }
    }

    /**
     * Lists all Gl2006idid models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Gl2006idid::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
     public function actionGen(){
        //$model = Gl2006idid::findAll();
        $model = Gl2006idid::find()->all();
        //print_r($model);
//        $model2 = Gl2006idid::find()->where('id>:id', array(':id'=>10))->all();
//        print_r($model2);
        foreach ($model as $a)
        {
                //echo $a['GL2006ID_HolderID'].'-'.$a['HD2006ID_HolderID'].'-'.$a['id']."<br />";
               $model2 = Gl2006idid::find()->where('id>:id', array(':id'=>$a['id']))->all();
               //print_r($model2);
               foreach ($model2 as $b)
                {
                   //echo $b['GL2006ID_HolderID']."<br />";
                    if($a['GL2006ID_HolderID']==$b['GL2006ID_HolderID'] && $a['HD2006ID_HolderID']==$b['HD2006ID_HolderID'])
                    {
                        echo $b['GL2006ID_HolderID'].'-'.$b['HD2006ID_HolderID'].'-'.$b['id']."<br />";
                        $customer = Gl2006idid::findOne($b['id']);
                        $customer->delete();
                        echo "del ".$b['id']."OK <br>";
                    }
                    elseif ($a['GL2006ID_HolderID']==$b['HD2006ID_HolderID'] && $a['HD2006ID_HolderID']==$b['GL2006ID_HolderID']) 
                    {
                        echo "<b>".$b['GL2006ID_HolderID'].'-'.$b['HD2006ID_HolderID'].'-'.$b['id']."</b><br />";
                        $customer = Gl2006idid::findOne($b['id']);
                        $customer->delete();
                        echo "del ".$b['id']."OK <br>";
                    }
                    
                }
                
        }
 }

    /**
     * Displays a single Gl2006idid model.
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
     * Creates a new Gl2006idid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gl2006idid();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Gl2006idid model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Gl2006idid model.
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
     * Finds the Gl2006idid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gl2006idid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gl2006idid::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
