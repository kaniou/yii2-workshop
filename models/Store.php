<?php

namespace app\models;

use yii\db\ActiveRecord;

class Store extends ActiveRecord {

    public static function tableName() {
        return 'store';
    }

    public function rules() {
        return [
            [['name', 'tel', 'address'], 'required']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'ชื่อคลังสินค้า',
            'tel' => 'เบอร์โทร',
            'address' => 'ที่ตั้ง',
            'branch_id' => 'สาขา'
        ];
    }

    public function getBranch() {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }

}
