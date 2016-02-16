<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;
use app\models\Userbook;

class Book extends ActiveRecord {

  public static function tableName() {
    return 'book';
  }

  public function getCategory() {
    return $this->hasOne(Category::className(), ['id' => 'category_id']);
  }

  public function rules() {
    return [
      [['title'], 'required'],
      [['id'], 'unique']
    ];
  }
  
  public function getUserbook() {
    return $this->hasOne(Userbook::className(), ['id_user' => 'id_user']);
  }
  
  public function attributeLabels(){
      //Label จะแสดงในฟอร์ม และทุกๆ ที่ที่มีการอ้างถึง fname และ lname    
          return [ 'title'=>'เรื่อง',  'date_book'=>'ลงวันที่'  ,
       'id_book'=>'เลขที่หนังสือ','begin_book'=>'จาก' ,'target'=>'ถึง' ,
              'id_user'=>'ผู้รับผิดชอบ','date_recieve'=>'วันที่ลงรับ',
              'category_id'=>'ประเภทหนังสือ','img'=>'ไฟล์แนบ'
              ];      
        }
  
  
  
}
