<?php

namespace app\models;

use yii\db\ActiveRecord;

class LoginLog extends ActiveRecord {

    public static function tableName() {
        return 'login_log';
    }

}
