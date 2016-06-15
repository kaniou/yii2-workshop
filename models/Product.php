<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord {

    public static function tableName() {
        return 'product';
    }

    public function rules() {
        return [
            [['barcode', 'qty', 'old_price', 'sal_price', 'name'], 'required'],
            [['barcode'], 'unique']
        ];
    }

    public function attributeLabels() {
        return [
            'barcode' => 'บาร์โค้ดสินค้า',
            'qty' => 'จำนวน',
            'sub_stock' => 'จำนวนที่จะตัดสต๊อก',
            'product_type_id' => 'ประเภทสินค้า',
            'old_price' => 'ราคาทุน',
            'sale_price' => 'ราคาจำหน่าย',
            'name' => 'ชื่อสินค้า',
            'ref_product_id' => 'สินค้าที่จะให้ไปตัดสต๊อก'
        ];
    }

    public function getProductType() {
        return $this->hasOne(ProductType::className(), ['id' => 'product_type_id']);
    }

    public function getRefProduct() {
        return $this->hasOne(Product::className(), ['barcode' => 'ref_product_id']);
    }

}
