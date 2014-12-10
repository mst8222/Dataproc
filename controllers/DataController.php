<?php

namespace app\controllers;

use Yii;
use app\models\Gl2002idid;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Gl2002ididController implements the CRUD actions for Gl2002idid model.
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
        $model = \app\models\Hd2002::find()->all();
        foreach ($model as $a){
            //HolderID
            //echo $a['HolderID']."<br>";
            $model2=  \app\models\Gl2002idid::findOne(array('GL2002ID_HolderID'=>$a['HolderID']));
            
            $model3=  \app\models\Gl2002idid::findOne(array('HD2002ID_HolderID'=>$a['HolderID']));
            
            //$model3=  \app\models\Gl2002idid::findOne('HD2002ID_HolderID='.$a['HolderID']);
            
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
        }
    }

    public function actionEqu(){
        set_time_limit(0);
        $i=1;
        $model = Gl2002idid::find()->all();
        //$fnum=Gl2002idid::find()->count();
        //echo $fnum; 
        //exit();     
        foreach ($model as $a)
        {           
            $customer2 = Gl2002idid::find()->where('GL2002ID_HolderID=:id or HD2002ID_HolderID=:id', array(':id'=>$a['GL2002ID_HolderID']))->all();
            $customer3 = Gl2002idid::find()->where('GL2002ID_HolderID=:id or HD2002ID_HolderID=:id', array(':id'=>$a['HD2002ID_HolderID']))->all();
             $sign= 'N2002'.$i;
             foreach ($customer2 as $cust2){
                 if($cust2->NValue!=Null){
                     $sign=$cust2->NValue;
                 }
             }
            foreach ($customer2 as $cust2){                 
                  if($cust2->NValue==Null){
                    $cust2->NValue =$sign;
                    $cust2->save();
                    echo $cust2->GL2002ID_HolderID.'-'.$cust2->HD2002ID_HolderID.'-'.$sign."<br>";
                  }
            }
            foreach ($customer3 as $cust3){
                 if($cust3->NValue!=Null){
                     $sign=$cust3->NValue;
                 }
             }
            foreach ($customer3 as $cust3){
                  if($cust3->NValue==Null){
                    $cust3->NValue =$sign;
                    $cust3->save();
                    echo $cust3->GL2002ID_HolderID.'-'.$cust3->HD2002ID_HolderID.'-'.$sign."<br>";
                  }  
            }
          
          $i++;
        }
        echo "done success!";
    }
    
     public function actionGen(){
         set_time_limit(0); 
        //$model = Gl2002idid::findAll();
        $model = Gl2002idid::find()->all();
        //print_r($model);
//        $model2 = Gl2002idid::find()->where('id>:id', array(':id'=>10))->all();
//        print_r($model2);
        foreach ($model as $a)
        {
                //echo $a['GL2002ID_HolderID'].'-'.$a['HD2002ID_HolderID'].'-'.$a['id']."<br />";
               $model2 = Gl2002idid::find()->where('id>:id', array(':id'=>$a['id']))->all();
               //print_r($model2);
               foreach ($model2 as $b)
                {
                   //echo $b['GL2002ID_HolderID']."<br />";
                    if($a['GL2002ID_HolderID']==$b['GL2002ID_HolderID'] && $a['HD2002ID_HolderID']==$b['HD2002ID_HolderID'])
                    {
                        echo $b['GL2002ID_HolderID'].'-'.$b['HD2002ID_HolderID'].'-'.$b['id']."<br />";
                        $customer = Gl2002idid::findOne($b['id']);
                        $customer->delete();
                        echo "del ".$b['id']."OK <br>";
                    }
                    elseif ($a['GL2002ID_HolderID']==$b['HD2002ID_HolderID'] && $a['HD2002ID_HolderID']==$b['GL2002ID_HolderID']) 
                    {
                        echo "<b>".$b['GL2002ID_HolderID'].'-'.$b['HD2002ID_HolderID'].'-'.$b['id']."</b><br />";
                        $customer = Gl2002idid::findOne($b['id']);
                        $customer->delete();
                        echo "del ".$b['id']."OK <br>";
                    }
                    
                }
                
        }
 }

    /**
     * Lists all Gl2002idid models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Gl2002idid::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gl2002idid model.
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
     * Creates a new Gl2002idid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gl2002idid();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Gl2002idid model.
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
     * Deletes an existing Gl2002idid model.
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
     * Finds the Gl2002idid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gl2002idid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gl2002idid::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
