<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Session;
use app\models\Account;

class AccountController extends Controller {

  public function actionEdit() {
    $session = new Session();
    $session->open();

    $pk = $session['member_id'];
    
    $account = Account::find($pk)->one();

    if (!empty($_POST)) {
      $account->name = $_POST['Account']['name'];
      $account->email = $_POST['Account']['email'];
      $account->username = $_POST['Account']['username'];
      $account->password = $_POST['Account']['password'];

      if ($account->save()) {
        $session->setFlash('message', 'Save Completed.');
        $session['account_name'] = $account->name;
        
        return $this->redirect(['edit']);
      }
    }

    return $this->render('//Account/Edit', ['account' => $account]);
  }

  public function actionIndex() {
    $accounts = Account::find()->orderBy('id DESC')->all();

    return $this->render('//Account/Index', [
      'accounts' => $accounts,
      'n' => 1
    ]);
  }

  public function actionForm() {
    $account = new Account();

    if (!empty($_POST)) {
      if (!empty($_POST['Account']['id'])) {
        $id = $_POST['Account']['id'];
        $account = Account::findOne($id);
      }

      $account->name = $_POST['Account']['name'];
      $account->username = $_POST['Account']['username'];
      $account->password = $_POST['Account']['password'];
      $account->email = $_POST['Account']['email'];
      $account->level = $_POST['Account']['level'];

      if ($account->save()) {
        $session = new Session();
        $session->open();
        $session->setFlash('message', 'Data Saved.');

        return $this->redirect(['index']);
      }
    }

    return $this->render('//Account/Form', [
      'account' => $account,
      'icon' => 'glyphicon glyphicon-plus',
      'title' => 'New Account'
    ]);
  }

  public function actionUpdate($id) {
    $account = Account::findOne($id);

    return $this->render('//Account/Form', [
      'account' => $account,
      'icon' => 'glyphicon glyphicon-pencil',
      'title' => 'Edit Account'
    ]);
  }

  public function actionDelete($id) {
    Account::findOne($id)->delete();
    $session = new Session();
    $session->open();
    $session->setFlash('message', 'Deleted.');

    return $this->redirect(['index']);
  }

}