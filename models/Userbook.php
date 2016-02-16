<?php

namespace app\models;

use yii\db\ActiveRecord;

class Userbook extends ActiveRecord {

  public static function tableName() {
    return 'userbook';
  }

  public function rules() {
    return [
      [['id_user', 'name_user'], 'required']
    ];
  }

}