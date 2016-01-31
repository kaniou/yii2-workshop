<?php

use yii\widgets\ActiveForm;
?>

<div class="panel panel-info" style="margin-right: 20px;">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-plus"></span>
        <strong>บันทึก</strong>
    </div>
    <div class="panel-body">
        <?php
        $f = ActiveForm::begin();
        echo $f->field($store, 'name');
        echo $f->field($store, 'tel');
        echo $f->field($store, 'address');
        echo $f->field($store, 'branch_id')->dropDownList($options);
        ?>
        <button class="btn btn-success">
            บันทึกรายการ
        </button>
        <?php ActiveForm::end(); ?>
    </div>
</div>

