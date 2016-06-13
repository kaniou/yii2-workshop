<?php

namespace app\models;

use yii\db\ActiveRecord;

class UserType extends ActiveRecord {

    public static function tableName() {
        return 'user_type';
    }

    public function rules() {
        return [
            [['name'], 'required']
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'ชื่อ',
            'access_report' => 'เข้าเมนูรายงานได้',
            'access_sale' => 'เข้าเมนูการขายได้',
            'access_config' => 'เข้าเมนูตั้งค่าได้',
            'access_stock' => 'เข้าเมนูสต๊อกได้',
            'access_member' => 'เข้าเมนูสมาชิกได้',
            'access_account' => 'เข้าเมนูบัญชีได้',
            'access_ar' => 'เข้าเมนูลูกหนี้ได้',
            'access_repair' => 'เข้าเมนูงานซ่อมได้',
            'access_serial' => 'เข้าเมนูต่อประกันได้'
        ];
    }

}
