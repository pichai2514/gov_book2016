<?php
use yii\widgets\LinkPager;
use yii\web\Session;

$session = new Session();
$session->open();
?>

<div class="panel">
  <div class="panel-body">
    <h4>หนังสือรับ</h4>
    <hr>

    <?php if (!empty($session->getFlash('message'))): ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i>
      <?php echo $session['message']; ?>
    </div>
    <?php endif; ?>

    <a href="index.php?r=book/form" class="btn btn-primary">
      <i class="glyphicon glyphicon-plus"></i>
      ลงหนังสือรับใหม่
    </a>

    <table class="table table-striped table-bordered" style="margin-top: 10px">
      <thead>
        <tr>
          <th width="40px" style="text-align: right">no</th>
       <!--   <th width="130px">barcode</th> -->
          <th width="50">เรื่อง</th>
          <th width="50">ประเภทหนังสือ</th>
          <th width="80px" style="text-align: right">ลงวันที่</th>
          <th width="80px" style="text-align: right">วันที่รับ</th>
          <th width="50px" style="text-align: right">ผู้รับผิดชอบ</th>
          <th width="150px"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($book as $books): ?>
        <tr>
          <td style="text-align: right"><?php echo $n++; ?></td>
       <!--   <td><?php //echo //$books->code; ?></td> -->
          <td><?php echo $books->title; ?></td>
          <td><?php echo $books->category->name; ?></td>
          <td style="text-align: right">
            <?php echo $books->date_book; ?>
          </td>   
          <td style="text-align: right"><?php echo $books->date_recieve; ?></td>
          <td style="text-align: right">
            <?php echo $books->userbook->name_user; ?>
          </td>
       
          <td style="text-align: center">
          <?php //echo $books->img; 
		  $ext=explode(".", $books->img);
		  $v=$ext[0];
		 // echo $v;
		  
	  echo "<a href=../uploads/$books->img    class=\"btn btn-info\"> ";
		  
		  ?>
      <!--      <a href="index.php?r=bookimage/index&book_id=<?php //echo $books->id; ?>" -->
               
              
              <i class="glyphicon glyphicon-picture"></i>
            </a>
            <a href="index.php?r=book/edit&id=<?php echo $books->id; ?>" 
              class="btn btn-success">
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="index.php?r=book/delete&id=<?php echo $books->id; ?>" 
              class="btn btn-danger" 
              onclick="return confirm('Are you sure delete date ?')">
              <i class="glyphicon glyphicon-remove"></i>
            </a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>

    <?php echo LinkPager::widget([
        'pagination' => $pages,
      ]); 
    ?>
  </div>
</div>