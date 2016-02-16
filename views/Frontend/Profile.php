<?php
use yii\widgets\ActiveForm;
use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
  <div class="panel-body">
    <h4>Profile</h4>
    <hr>

    <!-- flash message -->
    <?php if (!empty($session->getFlash('message'))): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo $session['message']; ?>
    </div>
    <?php endif; ?>
  
    <!-- form -->
    <?php $f = ActiveForm::begin(); ?>
    <?php
    echo $f->field($member, 'name');
    echo $f->field($member, 'username');
    echo $f->field($member, 'password')->passwordInput();
    ?>

    <div class="control-group">
      <input type="submit" class="btn btn-primary" value="Save" />
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>