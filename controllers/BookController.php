<?php

namespace app\controllers;
use Yii;
use yii\web\Session;
use yii\web\Controller;
use app\models\Book;
use app\models\Category;
use app\models\Userbook;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\BookSearch;

class BookController extends Controller {

  public function init() {
    $session = new Session();
    $session->open();

    if (empty($session['account_id'])) {
      return $this->redirect('index.php?r=backend/index');
    }

    parent::init();
  }

  public function actionIndex() 
          {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
  }
       
  public function actionView($id)
   {
      $book = new Book();
     $book1 = Book::findOne($id);
      $a= $book1->img;
         return $this->render('view', [
             'a'=>$a,
             
            // 'b'=>'โรงเรียน',
           // 'model' => $this->findModel($id),
        ]);
    }


      /*
    $totalCount = Book::find()->count();

    $pages = new Pagination([
      'totalCount' => $totalCount,
      'pageSize' => 15
    ]);

    $book = Book::find()
      ->orderBy('id desc') 
      ->offset($pages->offset)
      ->limit($pages->limit)
      ->all();

    return $this->render('//Book/Index', [
      'book' => $book,
      'pages' => $pages,
      'n' => 1
    ]); 
  }*/

  public function actionForm() {
    $book = new Book();
    $categorys = Category::find()->orderBy('name')->all();
    $userbook = Userbook::find()->orderBy('id_user')->all();
    $categoryIds = ArrayHelper::map($categorys, 'id', 'name');
    $userIds = ArrayHelper::map($userbook, 'id_user', 'name_user');
    if (!empty($_POST)) {
      if (!empty($_POST['Book']['id'])) {
        $id = $_POST['Book']['id'];
        $book = Book::findOne($id);
      }

      if (!empty($_FILES['Book']['name']['img'])) {        
        $img = $_FILES['Book']['name']['img'];
        $ext = end((explode(".", $img)));

        $name = microtime();
        $name = str_replace(' ', '', $name);
        $name = str_replace('.', '', $name);

        $name = $name.'.'.$ext;
        $tmp = $_FILES['Book']['tmp_name']['img'];
        $book->img = $name;
  
        move_uploaded_file($tmp, '../uploads/'.$name);
      } else{
         // if ($book->load(Yii::$app->request->post())) {
           $file = UploadedFile::getInstance($book, 'img');
           // $file->name =$book->img ;
           //echo $file;
           // $file->saveAs('../uploads/'.$file->name);
           $book->save();
         // }
      }
      
      // set value
    //  $book->code = $_POST['Book']['code'];
      $book->date_recieve = $_POST['Book']['date_recieve'];
      $book->id_user = $_POST['Book']['id_user'];//echo "mmmm";
      $book->date_book = $_POST['Book']['date_book'];
      $book->begin_book = $_POST['Book']['begin_book'];
      $book->target = $_POST['Book']['target'];
      $book->title = $_POST['Book']['title'];
      $book->id_book = $_POST['Book']['id_book'];
//      $book->status = $_POST['Book']['status'];
      $book->category_id = $_POST['Book']['category_id'];

      if ($book->save()) {
        $session = new Session();
        $session->open();
        $session->setFlash('message', 'Data Saved.');

        return $this->redirect(['index']);
      }
    }

    return $this->render('//Book/Form', [
      'book' => $book,
      'icon' => 'glyphicon glyphicon-plus',
      'title' => 'New book',
      'categoryIds' => $categoryIds,
      'userIds' => $userIds
    ]);
  }

  public function actionUpdate($id) {
    $book = Book::findOne($id);
    $categorys = Category::find()->orderBy('name')->all();
    $categoryIds = ArrayHelper::map($categorys, 'id', 'name');
    $userbook = Userbook::find()->orderBy('id_user')->all();
    $userIds = ArrayHelper::map($userbook, 'id_user', 'name_user');
    
    return $this->render('//Book/Form', [
      'book' => $book,
      'icon' => 'glyphicon glyphicon-pencil',
      'title' => 'Edit Book',
      'categoryIds' => $categoryIds,
        'userIds' => $userIds     
    ]);
  }

  public function actionDelete($id) {
    $product = Book::findOne($id);

    if (!empty($product)) {
      if (!empty($product->img)) {
        unlink('../uploads/'.$product->img);
      }

      $product->delete();

      $session = new Session();
      $session->open();
      $session->setFlash('message', 'Data Deleted.');

      return $this->redirect(['index']);
    }
  }

}