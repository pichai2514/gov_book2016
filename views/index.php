<?php
$model = new UploadFile();
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'file-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'), // จุดสำคัญ ห้ามลืมใส่ กรณี "อัพโหลดไฟล์ทุกชนิด"
));
 
echo $form->label($model,'fileField');
echo $form->fileField($model,'fileField');
echo $form->error($model,'fileField');
 
echo '<hr>';
echo CHtml::submitButton('อัพโหลดไฟล์');
 
$this->endWidget();
 
echo '<hr>';
 
// ตรวจสอบการ Submit
if(isset($_POST['UploadFile'])){
    $path = Yii::app()->basePath.'/../images/'; // ตำแหน่งที่เก็บไฟล์ D:∖xampp\htdocs\webapp\images\
    $file = CUploadedFile::getInstance($model,'fileField'); // ดึง Object CUploadFile ของ Field "fileField"
    if (is_object($file) && get_class($file)==='CUploadedFile'){
        $file->saveAs($path . $file->name); // บันทึกไฟล์ลงในโฟล์เดอร์ D:∖xampp\htdocs\webapp\images\images
        // ตรวจสอบไฟล์ที่อัพโหลด
        if(is_file($path . $file->name)){
            echo 'อัพโหลดไฟล์สำเร็จ ';
            $pathImg = Yii::app()->baseUrl.'/images/' . $file->name;
            echo CHtml::link('ดูไฟล์อัพโหลด', $pathImg, array('target' => '_blank'));
        }else{
            echo 'อัพโหลดไฟล์ไม่สำเร็จ';
        }
    }else{
        echo 'ไม่พบไฟล์';
    }
}
?>