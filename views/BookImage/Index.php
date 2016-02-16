<?php
use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
  <div class="panel-body">
    <h4>ไฟล์หนังสือ</h4>
    <hr>

    <div class="pull-left">
      <!-- product info -->
      <div>
        <?php //echo $product->code; ?> :
        <?php //echo $product->name; ?>
      </div>

      <!-- flash message -->
      <?php if (!empty($session->getFlash('message'))): ?>
      <div class="alert alert-success">
        <i class="glyphicon glyphicon-ok"></i>
        <?php echo $session['message']; ?>
      </div>
      <?php endif; ?>

      <div style="margin-top: 20px">
        <!-- button -->
        <a href="index.php?r=bookimage/form&book_id=<?php echo $product->id; ?>" 
          class="btn btn-primary">
          <i class="glyphicon glyphicon-plus"></i>
          บันทึกภาพหนังสือใหม่
        </a>

        <!-- image of product -->
        <table class="table table-striped table-bordered" style="margin-top: 10px">
          <thead>
            <tr>
              <th width="40px" style="text-align: right">no</th>
              <th>ไฟล์หนังสือ</th>
              <th width="300px">เรื่องหนังสือ</th>
              <th width="40px">ลบ</th>
             
            </tr>
          </thead>
          <tbody>
            <?php foreach ($productImages as $productImage): ?>
            <tr>
              <td style="text-align: right"><?php echo $n++; ?></td>
         <!--     <td><img src="../uploads/<?php // echo $productImage->url; ?>" width="150px" /></td>  -->
              <td><a href="../uploads/<?php echo $productImage->url; ?>">รายละเอียด </a></td>
              <td><?php echo $productImage->name; ?></td>
              <td style="text-align: center">
                <a href="index.php?r=bookimage/delete&id=<?php echo $productImage->id; ?>" 
                  onclick="return confirm('Are you sure delete ?')"
                  class="btn btn-danger">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="pull-right">
      <?php if (!empty($product->pdf)): ?>
      <img src="../uploads/<?php echo $product->pdf; ?>" width="250px" />
      <?php endif; ?>
    </div>
    <div class="clearfix"></div>
  </div>
</div>