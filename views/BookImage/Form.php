<?php
use yii\widgets\ActiveForm;
?>

<div class="panel">
  <div class="panel-body">
    <h4>ไฟล์หนังสือ > <?php echo $product->title; ?></h4>
    <hr>

    <?php $f = ActiveForm::begin([
      'action' => 'index.php?r=bookimage/form&book_id='.$product->id, 
      'options' => [
        'enctype' => 'multipart/form-data'
      ]
    ]); ?>
    <?= $f->field($productImage, 'name'); ?>
    <?= $f->field($productImage, 'url')->fileInput(); ?>

    <div class="form-group">
      <input type="submit" value="บันทึก" class="btn btn-primary">
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>