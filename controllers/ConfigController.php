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

    public function actionUsertype() {
        $userTypes = \app\models\UserType::find()
                ->orderBy('id DESC')
                ->all();
        $icon = [
            'yes' => '<span class="glyphicon glyphicon-ok"></span>',
            'no' => ''
        ];
        return $this->render('//config/user_type', [
                    'userTypes' => $userTypes,
                    'icon' => $icon
        ]);
    }

    public function actionUsertypeform($id = null) {
        $userType = new \app\models\UserType();

        $post = Yii::$app->request->post();
        if (!empty($id)) {
            $userType = \app\models\UserType::find()
                    ->where(['id' => $id])
                    ->one();

            $userType->access_report = ($userType->access_report == 'yes');
            $userType->access_config = ($userType->access_config == 'yes');
            $userType->access_sale = ($userType->access_sale == 'yes');
            $userType->access_stock = ($userType->access_stock == 'yes');
            $userType->access_member = ($userType->access_member == 'yes');
            $userType->access_account = ($userType->access_account == 'yes');
            $userType->access_ar = ($userType->access_ar == 'yes');
            $userType->access_repair = ($userType->access_repair == 'yes');
            $userType->access_serial = ($userType->access_serial == 'yes');
        }

        if (!empty($post)) {
            $userType->name = $post['UserType']['name'];
            $userType->access_config = $post['UserType']['access_config'] ? 'yes' : 'no';
            $userType->access_report = $post['UserType']['access_report'] ? 'yes' : 'no';
            $userType->access_sale = $post['UserType']['access_sale'] ? 'yes' : 'no';
            $userType->access_stock = $post['UserType']['access_stock'] ? 'yes' : 'no';
            $userType->access_member = $post['UserType']['access_member'] ? 'yes' : 'no';
            $userType->access_account = $post['UserType']['access_account'] ? 'yes' : 'no';
            $userType->access_ar = $post['UserType']['access_ar'] ? 'yes' : 'no';
            $userType->access_repair = $post['UserType']['access_repair'] ? 'yes' : 'no';
            $userType->access_serial = $post['UserType']['access_serial'] ? 'yes' : 'no';

            if ($userType->save()) {
                return $this->redirect(['usertype']);
            }
        }
        return $this->render('//config/user_type_form', [
                    'userType' => $userType
        ]);
    }

    public function actionUsertypedelete($id) {
        $userType = \app\models\UserType::find()
                ->where(['id' => $id])
                ->one();
        if (!empty($userType)) {
            if ($userType->delete()) {
                return $this->redirect(['usertype']);
            }
        }
    }

    public function actionUser() {
        $users = \app\models\User::find()
                ->orderBy('id DESC')
                ->all();
        return $this->render('//config/user', [
                    'users' => $users,
                    'n' => 1
        ]);
    }

    public function actionUserform($id = null) {
        $user = new \app\models\User();
        if (!empty($id)) {
            $user = \app\models\User::find()
                    ->where(['id' => $id])
                    ->one();
        }

        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $user->branch_id = $post['User']['branch_id'];
            $user->user_type_id = $post['User']['user_type_id'];
            $user->fname = $post['User']['fname'];
            $user->lname = $post['User']['lname'];
            $user->usr = $post['User']['usr'];
            $user->pwd = $post['User']['pwd'];
            $user->tel = $post['User']['tel'];
            $user->email = $post['User']['email'];
            $user->status = 'use';
            $user->created_at = new \yii\db\Expression('NOW()');

            if ($user->save()) {
                return $this->redirect(['user']);
            }
        }

        $branchs = \app\models\Branch::find()->all();
        $userTypes = \app\models\UserType::find()->all();

        $branchIds = \yii\helpers\ArrayHelper::map($branchs, 'id', 'name');
        $userTypeIds = \yii\helpers\ArrayHelper::map($userTypes, 'id', 'name');

        return $this->render('//config/user_form', [
                    'user' => $user,
                    'branchIds' => $branchIds,
                    'userTypeIds' => $userTypeIds
        ]);
    }

    public function actionUserdelete($id) {
        $user = \app\models\User::find()
                ->where(['id' => $id])
                ->one();
        if (!empty($user)) {
            if ($user->delete()) {
                return $this->redirect(['user']);
            }
        }
    }

    public function actionUserblock($id) {
        $user = \app\models\User::find()
                ->where(['id' => $id])
                ->one();
        if (!empty($user)) {
            $user->status = 'block';
            $user->block_at = new \yii\db\Expression('NOW()');

            if ($user->save()) {
                return $this->redirect(['user']);
            }
        }
    }

    public function actionUserunblock($id) {
        $user = \app\models\User::find()
                ->where(['id' => $id])
                ->one();
        if (!empty($user)) {
            $user->status = 'use';
            $user->block_at = '0000-00-00 00:00:00';
            if ($user->save()) {
                return $this->redirect(['user']);
            }
        }
    }

}
