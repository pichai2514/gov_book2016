<?php
use yii\widgets\ActiveForm;
?>

<div class="panel">
  <div class="panel-body">
    <?php $f = ActiveForm::begin([
      'options' => ['name' => 'formCheckout']
    ]); ?>

    <h4>
      <i class="glyphicon glyphicon-user"></i>
      Customer Info
    </h4>

    <div class="alert alert-info">
      <?php 
      echo $f->field($billOrder, 'name')->textInput(['style' => 'width: 250px']);
      echo $f->field($billOrder, 'tel')->textInput(['style' => 'width: 250px']);
      echo $f->field($billOrder, 'address')
      ?>
    </div>

    <h4 style="margin-top: 50px">
      <i class="glyphicon glyphicon-shopping-cart"></i>
      Items in Cart Check Out
    </h4>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="40px" style="text-align: right">no</th>
          <th width="100px">code</th>
          <th>name</th>
          <th width="100px" style="text-align: right">price</th>
          <th width="80px" style="text-align: right">qty</th>
          <th width="120px" style="text-align: right">total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $c): ?>
        <?php
        $sumQty += $c['qty'];
        $sumPrice += ($c['qty'] * $c['price']);
        ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
          <td><?php echo $c['code']; ?></td>
          <td><?php echo $c['name']; ?></td>
          <td style="text-align: right">
            <?php echo number_format($c['price']); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($c['qty']); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($c['qty'] * $c['price']); ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"><strong>Total</strong></td>
          <td style="text-align: right"><?php echo $sumQty; ?></td>
          <td style="text-align: right">
            <?php echo number_format($sumPrice); ?>
          </td>
        </tr>
      </tfoot>
    </table>

    <div style="text-align: center">
      <a href="index.php?r=frontend/addtocart" class="btn btn-primary btn-lg">
        <i class="glyphicon glyphicon-chevron-left"></i>
        Cart Management
      </a>
      <a href="javascript:void(0)" onclick="document.formCheckout.submit()" class="btn btn-success btn-lg">
        Checkout Now
        <i class="glyphicon glyphicon-chevron-right"></i>
      </a>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>