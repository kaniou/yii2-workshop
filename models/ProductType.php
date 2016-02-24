<?php

namespace app\models;

use yii\db\ActiveRecord;

class ProductType extends ActiveRecord {

    public static function tableName() {
        return 'product_type';
    }

    public function rules() {
        return [
            [['name'], 'required']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'ชื่อประเภท',
            'remark' => 'หมายเหตุ'
        ];
    }

}
