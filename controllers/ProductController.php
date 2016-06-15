<?php

namespace app\controller;

use Yii;
use yii\web\Controller;

class ProductController extends Controller{
    public function actionIndex(){
        $products=\app\models\Product::find()
        ->orderBy('id DESC')
        ->all();
        return $this->render('//product/index',[
            'products'=>$products
        ]);
    }
}