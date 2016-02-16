<?php

namespace app\controllers;

use yii\web\Session;
use yii\web\Controller;
use app\models\Member;
use yii\data\Pagination;

class MemberController extends Controller {

  public function init() {
    $session = new Session();
    $session->open();

    if (empty($session['account_id'])) {
      return $this->redirect('index.php?r=backend/index');
    }

    parent::init();
  }

  public function actionIndex() {
    $totalCount = Member::find()->count();

    $pages = new Pagination([
      'totalCount' => $totalCount,
      'pageSize' => 5
    ]);

    $members = Member::find()
      ->offset($pages->offset)
      ->limit($pages->limit)
      ->orderBy('id DESC')
      ->all();

    return $this->render('//Member/Index', [
      'members' => $members,
      'pages' => $pages,
      'n' => 1
    ]);
  }

}