<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;
use yii\data\Pagination;
use app\models\ProductImage;
use app\models\Member;
use yii\web\Session;
use app\models\BillOrder;
use app\models\BillOrderDetail;
use yii\db\Expression;
use app\models\Company;

class FrontendController extends Controller {

  public $layout = 'frontend';

  public function actionIndex($sort = 'box') {
    $totalCount = Product::find();

    if (!empty($_POST['search'])) {
      $search = '%'.$_POST['search'].'%';

      $totalCount = $totalCount->where('name LIKE(:search)', [
        ':search' => $search
      ]);
    }

    $totalCount = $totalCount->count();

    $pagination = new Pagination([
      'totalCount' => $totalCount,
      'pageSize' => 8
    ]);

    $products = Product::find()
      ->orderBy('id DESC')
      ->offset($pagination->offset)
      ->limit($pagination->limit);

    if (!empty($_POST['search'])) {
      $search = '%'.$_POST['search'].'%';

      $products = $products
        ->where('name LIKE(:search) OR price LIKE(:search)', [
          ':search' => $search
      ]);
    }

    return $this->render('//Frontend/Index', [
      'products' => $products->all(),
      'pagination' => $pagination,
      'sort' => $sort
    ]);
  }

  public function actionProductview($id) {
    $product = Product::findOne($id);
    $productImages = ProductImage::find()
      ->where(['product_id' => $id])
      ->orderBy('id DESC')
      ->all();

    return $this->render('//Frontend/ProductView', [
      'product' => $product,
      'productImages' => $productImages
    ]);
  }

  public function actionRegister() {
    $member = new Member();

    if (!empty($_POST)) {
      $member->name = $_POST['Member']['name'];
      $member->username = $_POST['Member']['username'];
      $member->password = $_POST['Member']['password'];

      if ($member->save()) {
        $session = new Session();
        $session->open();
        $session->setFlash('message', 'Register Success.');

        return $this->redirect(['registersuccess']);
      }
    }

    return $this->render('//Frontend/Register', [
      'member' => $member
    ]);
  }

  public function actionRegistersuccess() {
    return $this->render('//Frontend/RegisterSuccess');
  }

  public function actionLogin() {
    if (!empty($_POST)) {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $member = Member::find()->where([
        'username' => $username,
        'password' => $password
      ])->one();

      if (!empty($member)) {
        $session = new Session();
        $session->open();
        $session->set('member_id', $member->id);
        $session->set('member_name', $member->name);

        return $this->redirect(['memberhome']);
      } else {
        return $this->redirect(['index']);
      }
    }
  }

  public function actionMemberhome() {
    return $this->render('//Frontend/MemberHome');
  }

  public function actionProfile() {
    $session = new Session();
    $session->open();
    $id = $session->get('member_id');

    $member = Member::findOne($id);

    if (!empty($_POST)) {
      $member->name = $_POST['Member']['name'];
      $member->username = $_POST['Member']['username'];
      $member->password = $_POST['Member']['password'];

      if ($member->save()) {
        $session->setFlash('message', 'Update member info success.');
        return $this->redirect(['profile']);
      }
    }

    return $this->render('//Frontend/Profile', [
      'member' => $member
    ]);
  }

  public function actionLogout() {
    $session = new Session();
    $session->open();
    $session->set('member_id', null);
    $session->set('member_name', null);

    return $this->redirect(['index']);
  }

  public function actionAddtocart($id = null) {
    $product = Product::findOne($id);
    $session = new Session();
    $session->open();
    $cart = [];

    if (!empty($session->get('cart'))) {
      $cart = $session->get('cart');
    }

    if (!empty($_POST)) {
      $data = [
        'id' => $product->id,
        'code' => $product->code,
        'name' => $product->name,
        'price' => $product->price,
        'qty' => $_POST['qty']
      ];

      $cart[count($cart)] = $data;
      $session->set('cart', $cart);
    }

    return $this->render('//Frontend/AddToCart', [
      'product' => $product,
      'cart' => $cart,
      'n' => 1,
      'sumQty' => 0,
      'sumPrice' => 0
    ]);
  }

  public function actionCartremove($index, $id) {
    $session = new Session();
    $session->open();

    $cart = $session['cart'];

    if (count($cart) > 0) {
      $cart[$index] = null;
      $newCart = [];

      foreach ($cart as $c) {
        if ($c != null) {
          $newCart[] = $c;
        }
      }

      $session->set('cart', $newCart);

      return $this->redirect(['addtocart', 'id' => $id]);
    }
  }

  public function actionCheckout() {
    $session = new Session();
    $session->open();

    $cart = $session->get('cart');
    $billOrder = new BillOrder();

    if (!empty($_POST)) {
      // save bill order
      $billOrder->member_id = $session->get('member_id');
      $billOrder->ip = $_SERVER['REMOTE_ADDR'];
      $billOrder->created_at = new Expression('NOW()');
      $billOrder->status = 'wait';
      $billOrder->name = $_POST['BillOrder']['name'];
      $billOrder->address = $_POST['BillOrder']['address'];
      $billOrder->tel = $_POST['BillOrder']['tel'];

      if ($billOrder->save()) {
        // loop read data from session to database
        foreach ($cart as $c) {
          $billOrderDetail = new BillOrderDetail();
          $billOrderDetail->bill_order_id = $billOrder->id;
          $billOrderDetail->product_id = $c['id'];
          $billOrderDetail->price = $c['price'];
          $billOrderDetail->qty = $c['qty'];
          $billOrderDetail->save();
        }

        // clear session
        $session->set('cart', null);

        return $this->redirect(['checkoutsuccess']);
      }
    }

    return $this->render('//Frontend/Checkout', [
      'n' => 1,
      'cart' => $cart,
      'sumQty' => 0,
      'sumPrice' => 0,
      'billOrder' => $billOrder
    ]);
  }

  public function actionCheckoutsuccess() {
    return $this->render('//Frontend/CheckoutSuccess');
  }

  public function actionHistory() {
    $session = new Session();
    $session->open();

    $billOrders = BillOrder::find()
      ->where(['member_id' => $session->get('member_id')])
      ->orderBy('id DESC')
      ->all();

    return $this->render('//Frontend/History', [
      'billOrders' => $billOrders,
      'n' => 1,
      'sumQty' => 0,
      'sumPrice' => 0
    ]);
  }

  public function actionAbout() {
    $company = Company::find()->one();
    return $this->render('//Frontend/About', [
      'company' => $company
    ]);
  }  

  public function actionPayment() {
    $company = Company::find()->one();
    return $this->render('//Frontend/Payment', [
      'company' => $company
    ]);
  }

}