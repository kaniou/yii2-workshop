<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ProducttypeController extends Controller {

    public function actionIndex() {
        $productTypes = \app\models\ProductType::find()
                ->orderBy('id DESC')
                ->all();
        return $this->render('//product_type/index', [
                    'productTypes' => $productTypes
        ]);
    }

    public function actionForm($id = NULL) {
        $productType = new \app\models\ProductType();
        $post = Yii::$app->request->post();
        if (!empty($id)) {
            $productType = \app\models\ProductType::find()
                    ->where(['id' => $id])
                    ->one();
        }
        if (!empty($post)) {
            $productType->name = $post['ProductType']['name'];
            $productType->remark = $post['ProductType']['remark'];
            if ($productType->save()) {
                return $this->redirect(['index']);
            }   
        }
        return $this->render('//product_type/form', [
                    'productType' => $productType
        ]);
    }

    public function actionDelete($id) {
        $productType = \app\models\ProductType::find()
                ->where(['id' => $id])
                ->one();
        if (!empty($productType)) {
            if ($productType->delete()) {
                return $this->redirect(['index']);
            }
        }
    }

}
