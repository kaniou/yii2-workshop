<?php

use yii\widgets\ActiveForm;
use yii\web\Session;
?>

<div class="panel panel-info" style="margin-right: 20px">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-home"></span>
        ข้อมูลร้านค้า
    </div>
    <div class="panel-body">
        <?php
        $session = new Session();
        if ($session->hasFlash('message')):
            ?>
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                <strong><?php echo $session->getFlash('message'); ?></strong>
            </div>
        <?php endif; ?>

        <?php if (!empty($company->logo)): ?>
            <div>
                <img src="upload/<?php echo $company->logo; ?>" width="100px"/>
            </div>
        <?php endif; ?>
        <?php
        $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        echo $f->field($company, 'name');
        echo $f->field($company, 'tax_code');
        echo $f->field($company, 'tel');
        echo $f->field($company, 'website');
        echo $f->field($company, 'address');
        echo $f->field($company, 'vat');
        echo $f->field($company, 'logo')->fileInput();
        ?>
        <button class="btn btn-info">
            บันทึกรายการ
        </button>
        <?php ActiveForm::end(); ?>
    </div>
</div>
