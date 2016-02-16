<?php

namespace app\controllers;

use app\models\BookImage;
use app\models\Book;
use yii\web\Session;
use yii\web\Controller;

class BookImageController extends Controller {

  public function init() {
    $session = new Session();
    $session->open();

    if (empty($session['account_id'])) {
      return $this->redirect('index.php?r=backend/index');
    }

    parent::init();
  }

  public function actionIndex($book_id) {
    $product = Book::findOne($book_id);
    $productImages = BookImage::find()
      ->where(['product_id' => $book_id])
      ->orderBy('id DESC')
      ->all();

    return $this->render('//BookImage/Index', [
      'product' => $product,
      'productImages' => $productImages,
      'n' => 1
    ]);
  }

  public function actionForm($book_id) {
    $product = Book::findOne($book_id);
    $productImage = new BookImage();

    if (!empty($_FILES['BookImage'])) {
      $img = $_FILES['BookImage']['name']['url'];
      $ext = end((explode(".", $img)));

      $name = microtime();
      $name = str_replace(' ', '', $name);
      $name = str_replace('.', '', $name);

      $name = $name.'.'.$ext;
      $tmp = $_FILES['BookImage']['tmp_name']['url'];
      $productImage->url = $name;
  
      move_uploaded_file($tmp, '../uploads/'.$name);
    }

    if (!empty($_POST)) {
      $productImage->name = $_POST['BookImage']['name'];
      $productImage->product_id = $book_id;

      if ($productImage->save()) {
        $session = new Session();
        $session->open();
        $session->setFlash('message', 'Data Saved.');

        return $this->redirect(['index', 'book_id' => $book_id]);
      }
    }

    return $this->render('//BookImage/Form', [
      'product' => $product,
      'productImage' => $productImage
    ]);
  }

  public function actionDelete($id) {
    $productImage = BookImage::findOne($id);
    $product = $productImage->book;
    $image_url = $productImage->url;

    if ($productImage->delete()) {
      $session = new Session();
      $session->open();
      $session->setFlash('message', 'Data Deleted.');

      unlink('../uploads/'.$image_url);

      return $this->redirect(['index', 'book_id' => $product->id]);
    }
  }
}