<?php

namespace app\models;

use yii\db\ActiveRecord;

class BillOrder extends ActiveRecord {

  public static function tableName() {
    return 'bill_orders';
  }

  public function rules() {
    return [
      [['name', 'tel', 'address'], 'required']
    ];
  }

}