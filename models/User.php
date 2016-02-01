<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord {

    public static function tableName() {
        return 'user';
    }

    public function rules() {
        return [
            [['fname', 'lname', 'usr', 'pwd', 'tel', 'email'], 'required']
        ];
    }

    public function attributeLabels() {
        return [
            'user_type_id' => 'กลุ่มผู้ใช้',
            'fname' => 'ชื่อจริง',
            'lname' => 'นามสกุล',
            'branch_id' => 'สาขา',
            'usr' => 'username',
            'pwd' => 'password',
            'tel' => 'เบอร์โทร',
            'email' => 'อีเมล์',
            'status' => 'สถานะ'
        ];
    }

    public function getUserType() {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    public function getBranch() {
        return $this->hasOne(Branch::className(), ['id' => 'branch_id']);
    }

}
