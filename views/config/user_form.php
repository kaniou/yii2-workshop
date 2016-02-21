<?php

use yii\widgets\ActiveForm;
?>
<div class="panel panel-info" style="margin-right: 20px">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-plus"></span>
        บันทึกข้อมูลผู้ใช้ระบบ
    </div>
    <div class="panel-body">
        <?php
        $f = ActiveForm::begin();
        echo $f->field($user, 'user_type_id')->dropDownList($userTypeIds);
        echo $f->field($user, 'fname');
        echo $f->field($user, 'lname');
        echo $f->field($user, 'branch_id')->dropDownList($branchIds);
        echo $f->field($user, 'usr');
        echo $f->field($user, 'pwd');
        echo $f->field($user, 'tel');
        echo $f->field($user, 'email');
        ?>
        <button class="btn btn-success">บันทึกรายการ</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>

