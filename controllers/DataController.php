<?php

namespace app\controllers;

use Yii;
use app\models\Gl2013idid;
use \app\models\Hd2013;
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
        $model = Hd2013::find()->all();
        $i=0;
        foreach ($model as $a){
            //echo $a['HolderID']."<br>";
          if($a['NValue']==NULL){
            $model2 = Gl2013idid::find()->where('GL2013ID_HolderID=:id or HD2013ID_HolderID=:id', array(':id'=>$a['HolderID']))->limit(1)->all();
            
            $num2=  count($model2);
//            if($num2!=0){
//                print_r($model2);
//                exit();
//            }
            //echo $num2."<br>";
            foreach ($model2 as $b){
                $sign=$b->NValue;
            }
            
            if($num2!=0){
              //print_r($model2);
              $modelz= Hd2013::find()->where('HolderID=:rid',array(':rid'=>$a['HolderID']))->all();
              foreach ($modelz as $z){
                  if($z->NValue==Null){
                      $z->NValue = $sign;
                      $z->save();
                      echo $z->HolderID.'-'.$z->NValue."<br>";
                  }
              }              
            }
            $i++;
        }}
        echo "---".$i."----";
        echo 'done success! <br />';        
    }

    public function actionEqu(){
        set_time_limit(0);
        $i=1;
        $model = Gl2013idid::find()->all();
        //$fnum=Gl2013idid::find()->count();
        //echo $fnum; 
        //exit();     
        foreach ($model as $a)
        {           
            $customer2 = Gl2013idid::find()->where('GL2013ID_HolderID=:id or HD2013ID_HolderID=:id', array(':id'=>$a['GL2013ID_HolderID']))->all();
            $customer3 = Gl2013idid::find()->where('GL2013ID_HolderID=:id or HD2013ID_HolderID=:id', array(':id'=>$a['HD2013ID_HolderID']))->all();
             $sign= 'N2013'.$i;
             //$sga='';
            foreach ($customer2 as $cust2){                 
                 if($cust2->NValue!=Null){
                     $sign=$cust2->NValue;
                       foreach ($customer2 as $cust2){
                           if($cust2->NValue!=Null){
                               
                               if($sign>$cust2->NValue)
                               {  //echo $sign.'-'.$cust2->NValue.'<br />';
                                  $sign=$cust2->NValue;
                                  //echo $sign."<br>";
                               }
                           }
                       }
                     
                 }
                 //echo $a['GL2013ID_HolderID'].'-'.$sign.'-'.$cust2->id."<br>";
             }
             //echo $cust2->GL2013ID_HolderID.'-'.$cust2->HD2013ID_HolderID.'-'.$sign." GL<br>";
            foreach ($customer2 as $cust2){                 
                  //if($cust2->NValue==Null){
                    $cust2->NValue =$sign;
                    $cust2->save();
                    echo $cust2->GL2013ID_HolderID.'-'.$cust2->HD2013ID_HolderID.'-'.$sign."<br>";
                  //}
            }
            
            foreach ($customer3 as $cust3){                 
                 if($cust3->NValue!=Null){
                     $sign=$cust3->NValue;
                       foreach ($customer3 as $cust3){
                           if($cust3->NValue!=Null){
                               
                               if($sign>$cust3->NValue)
                               {  //echo $sign.'-'.$cust2->NValue.'<br />';
                                  $sign=$cust3->NValue;
                                  //echo $sign."<br>";
                               }
                           }
                       }
                     
                 }
                 //echo $a['GL2013ID_HolderID'].'-'.$sign.'-'.$cust2->id."<br>";
             }
             //echo $cust3->GL2013ID_HolderID.'-'.$cust3->HD2013ID_HolderID.'-'.$sign." HD<br>";
            foreach ($customer3 as $cust3){
                  //if($cust3->NValue==Null){
                    $cust3->NValue =$sign;
                    $cust3->save();
                    echo $cust3->GL2013ID_HolderID.'-'.$cust3->HD2013ID_HolderID.'-'.$sign."<br>";
                 // }
            }
          
          $i++;
        }
        echo "done success!";
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
