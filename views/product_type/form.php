<?php

use yii\widgets\ActiveForm;
?>
<div class="panel panel-info" style="margin-right: 20px">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-plus"></span>
        บันทึกรายการ
    </div>
    <div class="panel-body">
        <?php
        $f = ActiveForm::begin();
        echo $f->field($productType, 'name');
        echo $f->field($productType, 'remark');
?>
        <button class="btn btn-success">
            บันทึกรายการ
        </button>
        <?php ActiveForm::end();?>
    </div>
</div>
