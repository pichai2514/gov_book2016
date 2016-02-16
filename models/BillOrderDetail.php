<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Product;

class BillOrderDetail extends ActiveRecord {

  public static function tableName() {
    return 'bill_order_details';
  }

  public function getProduct() {
    return $this->hasOne(Product::className(), ['id' => 'product_id']);
  }

  public function getBillOrder() {
    return $this->hasOne(BillOrder::className(), ['id' => 'bill_order_id']);
  }
  
}