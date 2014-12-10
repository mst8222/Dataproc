<?php

namespace app\controllers;

use Yii;
use app\models\Gl2013idid;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Gl2013ididController implements the CRUD actions for Gl2013idid model.
 */
class DataController extends Controller
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
    
    public function actionCheck(){
        set_time_limit(0);
        $model = \app\models\Hd2013::find()->all();
        foreach ($model as $a){
            //HolderID
            //echo $a['HolderID']."<br>";
            $model2=  \app\models\Gl2013idid::findOne(array('GL2013ID_HolderID'=>$a['HolderID']));
            
            $model3=  \app\models\Gl2013idid::findOne(array('HD2013ID_HolderID'=>$a['HolderID']));
            
            //$model3=  \app\models\Gl2013idid::findOne('HD2013ID_HolderID='.$a['HolderID']);
            
            if($model2){
              //print_r($model2);
              $a->NValue = $model2->NValue;
              $a->save();
              echo $a->HolderID.'-'.$a->NValue."<br>";
            }
            
            if($model3){
//            print_r($model3);
              $a->NValue = $model3->NValue;
              $a->save();
              echo $a->HolderID.'-'.$a->NValue."<br>";
            }

//            if($model2){
//                $a->NValue = $model2->NValue;
//                $a->save();
//                echo $a->HolderID.'-'.$a->NValue."<br>";
//            }
//            
//            if($model3){
//                $a->NValue = $model3->NValue;
//                $a->save();
//                echo $a->HolderID.'-'.$a->NValue."<br>";
//            }
        }
    }

        public function actionEqu(){
        set_time_limit(0);
        $model = Gl2013idid::find()->all();
        $i=1;
        foreach ($model as $a)
        {
            $model2 = Gl2013idid::find()->where('GL2013ID_HolderID=:id', array(':id'=>$a['GL2013ID_HolderID']))->all();
            foreach ($model2 as $b)
            {                
                $customer = Gl2013idid::findOne($b['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2013'.$i;
                $customer->save();
                echo $b['GL2013ID_HolderID'].'-'.$b['HD2013ID_HolderID'].'-'.$b['id']."-".$customer->NValue."<br>";
                }
            }
            $model3 = Gl2013idid::find()->where('HD2013ID_HolderID=:id', array(':id'=>$a['GL2013ID_HolderID']))->all();
            foreach ($model3 as $c)
            {
                $customer = Gl2013idid::findOne($c['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2013'.$i;
                $customer->save();
                echo $c['GL2013ID_HolderID'].'-'.$c['HD2013ID_HolderID'].'-'.$c['id']."-".$customer->NValue."<br>";
                }
            }
            $model4 = Gl2013idid::find()->where('GL2013ID_HolderID=:id', array(':id'=>$a['HD2013ID_HolderID']))->all();
            foreach ($model4 as $d)
            {
                $customer = Gl2013idid::findOne($d['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2013'.$i;
                $customer->save();
                echo $d['GL2013ID_HolderID'].'-'.$d['HD2013ID_HolderID'].'-'.$d['id']."-".$customer->NValue."<br>";
                }
            }
            $model5 = Gl2013idid::find()->where('HD2013ID_HolderID=:id', array(':id'=>$a['HD2013ID_HolderID']))->all();
            foreach ($model5 as $e)
            {
                $customer = Gl2013idid::findOne($e['id']);
                if($customer->NValue==Null){
                $customer->NValue = 'N2013'.$i;
                $customer->save();
                echo $e['GL2013ID_HolderID'].'-'.$e['HD2013ID_HolderID'].'-'.$e['id']."-".$customer->NValue."<br>";
                }
            }
            $i++;
        }
    }
    
     public function actionGen(){
         set_time_limit(0); 
        //$model = Gl2013idid::findAll();
        $model = Gl2013idid::find()->all();
        //print_r($model);
//        $model2 = Gl2013idid::find()->where('id>:id', array(':id'=>10))->all();
//        print_r($model2);
        foreach ($model as $a)
        {
                //echo $a['GL2013ID_HolderID'].'-'.$a['HD2013ID_HolderID'].'-'.$a['id']."<br />";
               $model2 = Gl2013idid::find()->where('id>:id', array(':id'=>$a['id']))->all();
               //print_r($model2);
               foreach ($model2 as $b)
                {
                   //echo $b['GL2013ID_HolderID']."<br />";
                    if($a['GL2013ID_HolderID']==$b['GL2013ID_HolderID'] && $a['HD2013ID_HolderID']==$b['HD2013ID_HolderID'])
                    {
                        echo $b['GL2013ID_HolderID'].'-'.$b['HD2013ID_HolderID'].'-'.$b['id']."<br />";
                        $customer = Gl2013idid::findOne($b['id']);
                        $customer->delete();
                        echo "del ".$b['id']."OK <br>";
                    }
                    elseif ($a['GL2013ID_HolderID']==$b['HD2013ID_HolderID'] && $a['HD2013ID_HolderID']==$b['GL2013ID_HolderID']) 
                    {
                        echo "<b>".$b['GL2013ID_HolderID'].'-'.$b['HD2013ID_HolderID'].'-'.$b['id']."</b><br />";
                        $customer = Gl2013idid::findOne($b['id']);
                        $customer->delete();
                        echo "del ".$b['id']."OK <br>";
                    }
                    
                }
                
        }
 }

    /**
     * Lists all Gl2013idid models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Gl2013idid::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gl2013idid model.
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
     * Creates a new Gl2013idid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gl2013idid();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Gl2013idid model.
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
     * Deletes an existing Gl2013idid model.
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
     * Finds the Gl2013idid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gl2013idid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gl2013idid::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
