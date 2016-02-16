<?php
use app\models\BillOrderDetail;
?>

<div class="panel">
  <div class="panel-body">
    <h3>
      <i class="glyphicon glyphicon-th-list"></i>
      History
    </h3>
    <hr>

    <?php foreach ($billOrders as $billOrder): ?>
    <h4>
      <?php echo $billOrder->created_at; ?> : 
      <?php echo $billOrder->status; ?>
    </h4>
    <table style="margin-bottom: 50px" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="40px" style="text-align: right">no</th>
          <th width="100px">code</th>
          <th>name</th>
          <th width="80px" style="text-align: right">price</th>
          <th width="80px" style="text-align: right">qty</th>
          <th width="100px" style="text-align: right">total</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $billOrderDetails = BillOrderDetail::find()
          ->where(['bill_order_id' => $billOrder->id])
          ->orderBy('id DESC')
          ->all();
        $n = 1;
        ?>

        <?php foreach ($billOrderDetails as $billOrderDetail): ?>
        <?php
        $total = ($billOrderDetail->price * $billOrderDetail->qty);
        $sumQty += $billOrderDetail->qty;
        $sumPrice += $total;
        ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
          <td><?php echo $billOrderDetail->product->code; ?></td>
          <td><?php echo $billOrderDetail->product->name; ?></td>
          <td style="text-align: right">
            <?php echo number_format($billOrderDetail->price); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($billOrderDetail->qty); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($total); ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"><strong>Total</strong></td>
          <td style="text-align: right">
            <?php echo number_format($sumQty); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($sumPrice); ?>
          </td>
        </tr>
      </tfoot>
    </table>
    <?php endforeach; ?>
  </div>
</div>