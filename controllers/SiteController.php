<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller {
    /* public function behaviors() {
      return [
      'access' => [
      'class' => AccessControl::className(),
      'only' => ['logout'],
      'rules' => [
      [
      'actions' => ['logout'],
      'allow' => true,
      'roles' => ['@'],
      ],
      ],
      ],
      'verbs' => [
      'class' => VerbFilter::className(),
      'actions' => [
      'logout' => ['post'],
      ],
      ],
      ];
      }

      public function actions() {
      return [
      'error' => [
      'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
      'class' => 'yii\captcha\CaptchaAction',
      'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
      ];
      } */

    public function actionIndex() {
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $user = \app\models\User::find()->where([
                        'usr' => $post['User']['usr'],
                        'pwd' => $post['User']['pwd']
                    ])->one();
            $session = new \yii\web\Session();

            if (!empty($user)) {
                $session['user'] = $user;

                $loginLog = new \app\models\LoginLog();
                $loginLog->user_id = $user->id;
                $loginLog->created_at = new \yii\db\Expression('NOW()');
                $loginLog->save();

                $this->redirect(['home']);
            } else {
                $session->setFlash('message', 'Username ไม่ถูกต้อง');
            }
        }
        return $this->render('index');
    }

    public function actionHome() {
        return $this->render('home');
    }

    public function actionLogout() {
        $session = new \yii\web\Session();
        $session['user'] = null;
        $this->redirect(['index']);
    }

    public function actionProfile() {
        $session = new \yii\web\Session();
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $pk = $session['user']->id;
            $user = \app\models\User::find($pk)->one();
            $user->fname = $post['User']['fname'];
            $user->lname = $post['User']['lname'];
            $user->usr = $post['User']['usr'];
            $user->pwd = $post['User']['pwd'];
            $user->tel = $post['User']['tel'];
            $user->email = $post['User']['email'];
            if ($user->save()) {
                $session->setFlash('message', 'บันทึกรายการแล้ว');
                $session['user'] = $user;
            }
        }
        return $this->render('profile', [
                    'user' => $session['user'],
                    'session' => $session
        ]);
    }

}
