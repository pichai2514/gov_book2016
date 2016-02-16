<div class="panel">
  <div class="panel-body">
    <h4>Order</h4>
    <hr>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="50px" style="text-align: right">no</th>
          <th width="80px" style="text-align: center">bill no</th>
          <th>name</th>
          <th width="150px" style="text-align: center">tel</th>
          <th width="150px" style="text-align: center">created date</th>
          <th width="100px" style="text-align: center">status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($billOrders as $billOrder): ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
          <td style="text-align: center">
            <a class="btn btn-primary btn-sm"
              style="width: 100%" 
              href="index.php?r=order/detail&id=<?php echo $billOrder->id; ?>">
              <?php echo $billOrder->id; ?>
            </a>
          </td>
          <td>
            <?php echo $billOrder->name; ?>
          </td>
          <td style="text-align: center">
            <?php echo $billOrder->tel; ?>
          </td>
          <td style="text-align: center">
            <?php echo $billOrder->created_at; ?>
          </td>
          <td style="text-align: center">
            <?php if ($billOrder->status == 'pay'): ?>
              <div class="label label-success">
                <i class="glyphicon glyphicon-ok"></i>
                <?php echo $billOrder->status; ?>
              </div>
            <?php else: ?>
              <?php echo $billOrder->status; ?>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>