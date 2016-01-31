<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Company;
use yii\web\Session;

class ConfigController extends Controller {

    public function actionCompany() {
        $company = Company::find()->one();
        if (empty($company)) {
            $company = new Company();
            $company->vat = 0;
            $company->logo = '';
        }
        $post = Yii::$app->request->post();

        if (!empty($post)) {
            if (!empty($_FILES['Company']['name']['logo'])) {
                $tmp_name = $_FILES['Company']['tmp_name']['logo'];
                $name = $_FILES['Company']['name']['logo'];

                if (file_exists('upload/' . $name)) {
                    unlink('upload' . $name);
                }

                if (move_uploaded_file($tmp_name, 'upload/' . $name)) {
                    $company->logo = $name;
                }
            }

            $company->name = $post['Company']['name'];
            $company->tax_code = $post['Company']['tax_code'];
            $company->tel = $post['Company']['tel'];
            $company->website = $post['Company']['website'];
            $company->address = $post['Company']['address'];
            $company->vat = $post['Company']['vat'];

            if ($company->save()) {
                $session = new Session();
                $session->setFlash('message', 'บันทึกรายการแล้ว');

                return $this->redirect(['company']);
            }
        }
        return $this->render('//config/company', [
                    'company' => $company
        ]);
    }

    public function actionBranch() {
        $branchs = \app\models\Branch::find()->orderBy('id DESC')->all();

        return $this->render('//config/branch', [
                    'branchs' => $branchs,
        ]);
    }

    public function actionBranchform($id = null) {
        $branch = new \app\models\Branch();
        $post = Yii::$app->request->post();
        if (!empty($id)) {
            $branch = \app\models\Branch::find()->where(['id' => $id])->one();
        }

        if (!empty($post)) {
            $branch->name = $post['Branch']['name'];
            $branch->tel = $post['Branch']['tel'];
            $branch->address = $post['Branch']['address'];

            if ($branch->save()) {
                return $this->redirect(['branch']);
            }
        }
        return $this->render('//config/branch_form', [
                    'branch' => $branch
        ]);
    }

    public function actionBranchdelete($id) {
        $branch = \app\models\Branch::find()->where(['id' => $id])->one();
        if (!empty($branch)) {
            if ($branch->delete()) {
                return $this->redirect(['branch']);
            }
        }
    }

    public function actionStore() {
        $stores = \app\models\Store::find()->orderBy('id DESC')->all();
        return $this->render('//config/store', [
                    'stores' => $stores
        ]);
    }

    public function actionStoreform($id = null) {
        $store = new \app\models\Store();
        $branchs = \app\models\Branch::find()->all();
        $options = \yii\helpers\ArrayHelper::map($branchs, 'id', 'name');
        $post = Yii::$app->request->post();

        if (!empty($id)) {
            $store = \app\models\Store::find()->where(['id' => $id])->one();
        }
        if (!empty($post)) {
            $store->name = $post['Store']['name'];
            $store->tel = $post['Store']['tel'];
            $store->address = $post['Store']['address'];
            $store->branch_id = $post['Store']['branch_id'];
            if ($store->save()) {
                return $this->redirect(['store']);
            }
        }

        return $this->render('//config/store_form', [
                    'store' => $store,
                    'options' => $options
        ]);
    }

    public function actionStoredelete($id) {
        $store = \app\models\Store::find()->where(['id' => $id])->one();
        if (!empty($store)) {
            if ($store->delete()) {
                return $this->redirect(['store']);
            }
        }
    }

}
