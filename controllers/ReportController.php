<?php

namespace app\controllers;

use yii\web\Session;
use yii\web\Controller;
use app\models\BillOrderDetail;
use app\models\BillOrder;

class Reportcontroller extends Controller {

  public function init() {
    $session = new Session();
    $session->open();

    if (empty($session['account_id'])) {
      return $this->redirect('index.php?r=backend/index');
    }

    parent::init();
  }

  public function actionIndex() {
    $y = date('Y');
    $m = date('m');

    if (!empty($_POST)) {
      $y = $_POST['year'];
      $m = $_POST['month'];
    }

    $params = [':y' => $y, ':m' => $m];
    $conditions = "
      YEAR(pay_date) = :y 
      AND MONTH(pay_date) = :m 
      AND status = 'pay'
    ";
    $billOrder = new BillOrder();
    $year_list = [];
    $month_list = [];

    // year list
    $start_year = date('Y');

    for ($i = ($start_year - 1); $i <= $start_year; $i++) {
      $year_list[$i] = $i;
    }

    // month list
    for ($i = 1; $i <= 12; $i++) {
      $month_list[$i] = $i;
    }

    $orderDetails = BillOrderDetail::find()
      ->leftJoin('bill_orders', 'bill_orders.id = bill_order_details.bill_order_id')
      ->where($conditions, $params)
      ->orderBy('bill_order_details.id DESC')
      ->all();

    return $this->render('//Report/Index', [
      'n' => 1,
      'y' => ($y * 1),
      'm' => ($m * 1),
      'billOrderDetails' => $orderDetails,
      'billOrder' => $billOrder,
      'year_list' => $year_list,
      'month_list' => $month_list
    ]);
  }

}