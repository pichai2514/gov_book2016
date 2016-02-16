<?php
use yii\bootstrap\ActiveForm;
use yii\web\Session;
 use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//use dosamigos\datepicker\DateTimePicker;
use dosamigos\datepicker\DatePicker;

//use yii\widgets\ActiveForm;

$session = new Session();
$session->open();
?>

<div class="panel">
  <div class="panel-body">
    <h4>
      <i class="<?php echo $icon; ?>"></i>
      <?php echo $title; ?>
    </h4>
    <hr>

    <?php if (!empty($session->getFlash('message'))): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo $session['message']; ?>
    </div>
    <?php endif; ?>

    <?php $f = ActiveForm::begin([
      'action' => 'index.php?r=book/form',
      'options'=> ['enctype'=>'multipart/form-data'],
      'layout' => 'horizontal',
      'fieldConfig' => [
        'horizontalCssClasses' => [
          'offset' => 'col-sm-offset-3',
          'label' => 'col-sm-2 col-md-2',
          'wrapper' => 'col-sm-9',
          'error' => '',
          'hint' => 'col-sm-3'
        ]
      ]
    ]);

    echo $f->field($book, 'category_id')
      ->dropdownList($categoryIds, ['style' => 'width: 200px']);
   // echo $f->field($book, 'code')
    //  ->textInput(['style' => 'width: 100px']);
    //echo $f->field($book, 'name')
      //->textInput(['style' => 'width: 300px']);;
    echo $f->field($book, 'id_book');
    echo $f->field($book, 'date_book')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'language' => 'th',
        // 'inline' => true, 
      //  'pickButtonIcon' => 'glyphicon glyphicon-time',
         // modify template for custom rendering
        'template' => '{input}{addon}',
        'clientOptions' => [
            'autoclose' => TRUE,
            'format' => 'yyyy-mm-dd'
            //'todayHighlight' => true
        ]
]);
     echo $f->field($book, 'date_recieve')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'language' => 'th',
    //  'type' => DatePicker::TYPE_INPUT,
       // 'type' => DatePicker::TYPE_COMPONENT_APPEND,
      //  'type' => DatePicker::TYPE_INPUT,
         //'inline' => true, 
      //  'pickButtonIcon' => 'glyphicon glyphicon-time',
         // modify template for custom rendering
        'template' => '{input}{addon}',
        'clientOptions' => [
            'autoclose' => TRUE,
            'format' => 'yyyy-mm-dd'
            //'todayHighlight' => true
        ]
]);
    echo $f->field($book, 'begin_book')
      ->textInput(['style' => 'width: 300px']);
    echo $f->field($book, 'target')
      ->textInput(['style' => 'width: 300px']);;
    echo $f->field($book, 'title');
     // ->textInput(['style' => 'width: 100px']);;
	   /*echo $f->field($book, 'person')
      ->textInput(['style' => 'width: 100px']);
	   echo $f->field($book, 'status') 
      ->textInput(['style' => 'width: 100px']);*/
    $a="ไฟล์เดิม";
     echo $f->field($book,'id_user')->dropdownList($userIds, ['style'=>'width:200px']);
    echo $f->field($book, 'id')->hiddenInput()->label(false); 
    
    echo $f->field($book, 'img')-> fileInput()."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            . &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            . &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            . ไฟล์เดิม"."&nbsp;&nbsp;&nbsp;&nbsp;"
            . "&nbsp;&nbsp;&nbsp;&nbsp;<a href=../uploads/$book->img >".$book->img."</br></br>"; ?>
         <?php // echo  Html::img('../uploads/'.$book->img);?>
      <?php    //echo '$a."<a href=../uploads/$book->img    > ";?>
   <?php
   //echo $book->img;
   
    ?>

    <div class="form-group">
      <label class="control-label col-sm-3 col-md-2"></label>
      <div class="col-sm-9 col-md-9">
        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>