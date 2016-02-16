<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\Session;

AppAsset::register($this);

$session = new \yii\web\Session();
$session->open();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language = 'th_TH'; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style>
      body {
        background: #BDC3C7;
      }
    </style>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <div class="navbar-inverse navbar-fixed-top navbar" style="padding-right: 20px">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/icommerce/web/index.php">
              ระบบรับหนังสือกลุ่มงานพัฒนายุทธศาสตร์สาธารณสุข
            </a>
          </div>

          <div class="collapse navbar-collapse">
            <ul class="navbar-nav navbar-right nav">
              <?php if (!empty($session['account_id'])): ?>
             <!-- <li>
                <a href="index.php?r=order/index">
                  Order
                </a>
              </li>
              <li>
                <a href="index.php?r=category/index">
                  หนังสือส่ง
                </a>
              </li>   -->
              <li>
                <a href="index.php?r=book/index">
                  หนังสือรับ
                </a>
              </li>
              <!--
              <li>
                <a href="index.php?r=member/index">
                  Member
                </a>
              </li>
              <li>
                <a href="index.php?r=report/index">
                  Report
                </a>
              </li>
              <li>
                <a href="index.php?r=account/index">
                  Account
                </a>
              </li>
              <li>
                <a href="index.php?r=company/index">
                  Company
                </a>
              </li>  -->
              <?php endif; ?>
            </ul>
          </div>
        </div>
        
        <div class="container">
          <div class="row" style="text-align: right; margin-bottom: 10px;">
            <?php if (!empty($session['account_id'])): ?>
              <strong>
                <?php echo $session['account_name']; ?>
              </strong>
              <a href="index.php?r=account/edit" class="btn btn-primary">
                <i class="glyphicon glyphicon-cog"></i>
                Edit
              </a>
              <a href="index.php?r=backend/logout" class="btn btn-danger" onclick="return confirm('Are you sure logout from system')">
                <i class="glyphicon glyphicon-off"></i>
                Logout
              </a>
            </li>
            <?php endif; ?>
          </div>
          
          <div class="row">
            <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
          </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-right">สำนักงานสาธารณสุขจังหวัดสุราษฎร์ธานี&nbsp;&nbsp;&nbsp;<?= date('M-Y') ?></p>
            <p class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p class="pull-right">กลุ่มงานพัฒนายุทธศาสตร์สาธารณสุข</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
