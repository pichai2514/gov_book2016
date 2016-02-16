<?php
use yii\widgets\LinkPager;
?>

<div class="panel">
  <div class="panel-body">
    <h4>Member</h4>
    <hr>

    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th width="50px" style="text-align: right">no</th>
          <th>name</th>
          <th width="200px">username</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($members as $member): ?>
        <tr>
          <td styel="text-align: right"><?php echo $n++; ?></td>
          <td><?php echo $member->name; ?></td>
          <td><?php echo $member->username; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php echo LinkPager::widget([
        'pagination' => $pages,
      ]); 
    ?>
  </div>
</div>