<?php

use yii\widgets\ActiveForm;
?>
<div class="panel panel-info" style="margin-right: 20px;">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-plus"></span>
        บันทึก
    </div>
    <div class="panel-body">
        <?php
        $f = ActiveForm::begin();
        echo $f->field($userType, 'name');
        echo $f->field($userType, 'access_report')->checkbox();
        echo $f->field($userType, 'access_sale')->checkbox();
        echo $f->field($userType, 'access_config')->checkbox();
        echo $f->field($userType, 'access_stock')->checkbox();
        echo $f->field($userType, 'access_member')->checkbox();
        echo $f->field($userType, 'access_account')->checkbox();
        echo $f->field($userType, 'access_ar')->checkbox();
        echo $f->field($userType, 'access_repair')->checkbox();
        echo $f->field($userType, 'access_serial')->checkbox();
        ?>
        <button class="btn btn-info">
            บันทึกรายการ
        </button>
        <?php ActiveForm::end(); ?>
    </div>
</div>

