<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\modules\meeting\models\Meeting 

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'การจองห้องประชุม', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="box box-info box-solid">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> <?php // Html::encode($this->title) ?></h3>
    </div>
    <div class="box-body">

        <p>
            <?php // Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
           <?php // Html::open('แก้ไข', ['update', 'id' => $model->id], ) ?>
            
            <?php echo $a;// echo "<a href=../uploads/$model->img    class=\"btn btn-info\"> "; ?>
            <?php // echo $b;?>
                 <script type=text/javascript>window.open('../uploads/<?=$a?>',"_self")</script> 
            
            <?php //echo $a;?>
                
            <?php
          /*   =Html::a('ลบ', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
          */  ?>
        </p>

        <?php   /*
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'title',
                'description:ntext',
                'date_start',
                'date_end',
                'created_at',
                'updated_at',
                'room.name',
                [
                    'attribute' => 'user_id',
                    'value' => $model->user->firstname.' '.$model->user->lastname,
                ],
                //'status',
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => Yii::$app->meeting->getMeetingStatus($model->status),
                ]
            ],
        ]) */
        ?>
      <!--  <h4>รายการอุปกรณ์ที่ใช้</h4>  -->
        <?php   /*GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'attribute' => 'equipment_id',
                    'value' => function($model){
                        return $model->equipment->equipment;
                    }
                ]
            ]
        ]) */ ?>
    </div>
</div>