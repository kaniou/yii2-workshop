<?php

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;

AppAsset::register($this);

$session = new \yii\web\Session();
?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo Html::csrfMetaTags() ?>
        <title>ระบบร้านค้าปลีก</title>
        <?php $this->head() ?>
        <link rel="stylesheet" type="text/css" href="css/superhero.css"/>
        <style>
            .has-error{
                background: #d9534f;
                padding: 8px;
            }
            .has-error .control-label{
                color: #f9f8f7;
            }
            .has-error .help-block{
                color: #f9f8f7;
            }
            table.table-bordered tr td{
                border-bottom: #ccc 1px solid;
            }
            .table thead tr th{
                color: #333;
                background: #ccc;
                padding: 10px;
            }
            .table{
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <div class="nav navbar-inverse" style="padding: 5px; padding-left: 15px">
                <div class="pull-left">
                    <h4 class="navbar-heading">ระบบร้านค้าปลีก</h4>
                </div>
                <div class="pull-right">
                    <?php if ($session['user'] != null): ?>
                        <strong>
                            <a href="index.php?r=site/profile" style="color: #f9f8f7">
                                <?php echo $session['user']->fname; ?>
                                <?php echo $session['user']->lname; ?>
                            </a>
                            <a href="index.php?r=site/logout" class="btn btn-success" onclick="return confirm('ออกจากระบบ')">
                                <span class="glyphicon glyphicon-off"></span>
                                ออกจากระบบ
                            </a>
                        </strong>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>                
            </div>

            <?php if ($session['user'] == null): ?>
                <div class="row">
                    <center>
                        <div class="panel panel-success" style="width:500px;margin-top: 100px">
                            <div class="panel-heading">
                                <h4>
                                    <span class="glyphicon glyphicon-user"></span>
                                    <strong>Login เข้าระบบ</strong>
                                </h4>
                            </div>
                            <div class="panel-body" style="text-align: left">
                                <?php if ($session->hasFlash('message')): ?>
                                    <div class="alert alert-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        <?php echo $session->getFlash('message'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                $user = new \app\models\User();
                                $f = ActiveForm::begin();
                                echo $f->field($user, 'usr')
                                        ->label('Username');
                                echo $f->field($user, 'pwd')
                                        ->passwordInput()
                                        ->label('Password');
                                ?>
                                <button class="btn btn-info">
                                    Login Now
                                </button>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    </center>
                </div>
            <?php endif; ?>

            <?php if ($session['user'] != null): ?>
                <div class="row">
                    <div class="col-md-2">
                        <?php echo $this->render('//site/menu_left'); ?>
                    </div>
                    <div class="col-md-10" style="padding-top: 5px;">
                        <?php echo $content ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage(); ?>