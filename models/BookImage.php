<?php

namespace app\models;

use yii\db\ActiveRecord;

class BookImage extends ActiveRecord {

  public static function tableName() {
    return 'book_images';
  }

  public function getBook() {
    return $this->hasOne(Book::className(), ['id' => 'product_id']);
  }

}