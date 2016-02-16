<?php

namespace app\controllers;

use app\models\BillOrder;
use app\models\BillOrderDetail;
use yii\web\Session;
use yii\web\Controller;
use yii\db\Expression;

class OrderController extends Controller {

  public function init() {
    $session = new Session();
    $session->open();

    if (empty($session['account_id'])) {
      return $this->redirect('index.php?r=backend/index');
    }

    parent::init();
  }

  public function actionIndex() {
    $billOrders = BillOrder::find()->orderBy('id DESC')->all();

    return $this->render('//Order/Index', [
      'n' => 1,
      'billOrders' => $billOrders
    ]);
  }

  public function actionDetail($id) {
    $billOrder = BillOrder::findOne($id);
    $billOrderDetails = BillOrderDetail::find()
      ->where(['bill_order_id' => $id])
      ->orderBy('id DESC')
      ->all();

    return $this->render('//Order/Detail', [
      'billOrder' => $billOrder,
      'billOrderDetails' => $billOrderDetails,
      'n' => 1
    ]);
  }

  public function actionPay($id) {
    $billOrder = BillOrder::findOne($id);
    $billOrder->status = 'pay';
    $billOrder->pay_date = new Expression('NOW()');
    $billOrder->save();

    return $this->redirect(['index']);
  }

  public function actionSend($id) {
    $billOrder = BillOrder::findOne($id);
    $billOrder->status = 'send';
    $billOrder->send_date = new Expression('NOW()');
    $billOrder->save();

    return $this->redirect(['index']);
  }

  public function actionCancel($id) {
    $billOrder = BillOrder::findOne($id);
    $billOrder->status = 'cancel';
    $billOrder->send_date = null;
    $billOrder->pay_date = null;
    $billOrder->save();

    return $this->redirect(['index']);
  }
}