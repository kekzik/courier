<?php

namespace app\controllers;
use app\models\Orders;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii;
use yii\data\ActiveDataProvider;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Orders();
        if($model->load(Yii::$app->request->post())){
            $model->save(false);
            return $this->redirect(array('order/view'));
        }
        else
        {
            
            return $this->render('index',['model' => $model]);
        }
        
    }
    
    public function actionView()
    {
        //$model = new Orders();
        $query = Orders::find();
        $models = $query->all();
       // print_r($orders);
         $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 5,
            ],
        ]);
       return $this->render('view',['models'=>$models,'dataProvider'=>$dataProvider]);
    }
}
