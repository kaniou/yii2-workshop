<?php

namespace app\models;

use yii\db\ActiveRecord;

class Branch extends ActiveRecord {

    public static function tableName() {
        return 'branch';
    }

    public function rules() {
        return [
            [['name', 'tel', 'address'], 'required']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'ชื่อสาขา',
            'tel' => 'เบอร์โทร',
            'address' => 'ที่ตั้ง'
        ];
    }

}
