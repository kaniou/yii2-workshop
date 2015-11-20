<?php

use yii\widgets\ActiveForm;
?>

<div class="panel panel-info" style="margin-right: 20px">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-user"></span>
        <strong>ข้อมูลของคุณ</strong>
    </div>
    <div class="panel-body">
<?php if ($session->hasFlash('message')): ?>
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                <strong><?php echo $session->getFlash('message') ?></strong>
            </div>
        <?php endif; ?>

        <?php
        $f = ActiveForm::begin();
        echo $f->field($user, 'fname')->label('ชื่อ');
        echo $f->field($user, 'lname')->label('นามสกุล');
        echo $f->field($user, 'usr')->label('Username');
        echo $f->field($user, 'pwd')->label('Password');
        echo $f->field($user, 'tel')->label('เบอร์โทร');
        echo $f->field($user, 'email')->label('Email');
        ?>
        <button class="btn btn-info">บันทึก</button>
<?php ActiveForm::end(); ?>
    </div>
</div>

