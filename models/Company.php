<?php

namespace app\models;

use yii\db\ActiveRecord;

class Company extends ActiveRecord {

    public static function tableName() {
        return 'company';
    }

    public function rules() {
        return [
            [['name', 'address'], 'required']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'ชื่อ',
            'tax_code' => 'เลขผู้เสียภาษี',
            'tel' => 'เบอร์โทร',
            'website' => 'เว็บไซต์',
            'address' => 'ที่อยู่',
            'vat' => 'การคิดภาษี vat',
            'logo' => 'Logo ร้าน'
        ];
    }

}
