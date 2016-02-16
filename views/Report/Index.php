<?php
use yii\widgets\ActiveForm;
?>

<div class="panel">
  <div class="panel-body">
    <h4>Report Income</h4>
    <hr>

    <!-- filter -->
    <?php $f = ActiveForm::begin(['options' => [
      'class' => 'form-inline',
      'name' => 'formReport'
    ]]); ?>

    <label>Year</label>
    <select name="year" class="form-control">
      <?php foreach ($year_list as $year): ?>
      <option value="<?php echo $year; ?>" 
        <?php if ($y == $year): ?> 
          selected 
        <?php endif; ?>
        >
        <?php echo $year; ?>
      </option> 
      <?php endforeach; ?>
    </select>

    <label style="width: 80px; text-align: right">Month</label>
    <select name="month" class="form-control">
      <?php foreach ($month_list as $month): ?>
      <option value="<?php echo $month; ?>" 
        <?php if ($m == $month): ?> 
          selected 
        <?php endif; ?>
        >
        <?php echo $month; ?>
      </option> 
      <?php endforeach; ?>
    </select>

    <a href="javascript:void(0)" 
      onclick="document.formReport.submit()" 
      class="btn btn-primary">
      Show Data
    </a>

    <?php ActiveForm::end(); ?>

    <!-- data -->
    <table style="margin-top: 20px" class="table table-bordered table-striped">
      <thead>
        <tr>
          <td width="40px" style="text-align: right">no</td>
          <td width="80px">bill no</td>
          <td width="30px">day</td>
          <td width="200px">name</td>
          <td width="150px">tel</td>
          <td>product</td>
          <td width="80px" style="text-align: right">price</td>
          <td width="70px" style="text-align: right">qty</td>
          <td width="90px" style="text-align: right">total</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($billOrderDetails as $billOrderDetail): ?>
        <?php 
        $d = $billOrderDetail->billOrder->pay_date;
        $d = explode(' ', $d);
        $d = explode('-', $d[0]);
        $d = $d[2];
        ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
          <td><?php echo $billOrderDetail->bill_order_id; ?></td>
          <td><?php echo $d; ?></td>
          <td><?php echo $billOrderDetail->billOrder->name; ?></td>
          <td><?php echo $billOrderDetail->billOrder->tel; ?></td>
          <td><?php echo $billOrderDetail->product->name; ?></td>
          <td style="text-align: right">
            <?php echo number_format($billOrderDetail->price); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($billOrderDetail->qty); ?>
          </td>
          <td style="text-align: right">
            <?php echo number_format($billOrderDetail->price * $billOrderDetail->qty); ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>