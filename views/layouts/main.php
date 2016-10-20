<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div>
              <img src="<?=  Yii::getAlias('@web')?>/img/header.png" class="img-responsive" alt="header" >
            </div>
    
       
    
    
    <?php
    NavBar::begin([
        'brandLabel' => '<span class="glyphicon glyphicon-tree-deciduous">ICOH',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    
    
    $setting=[
        ['label' => 'สถานะคอมพิวเตอร์','url' => ['/comstatus']],
        ['label' => 'ประเภทคอมพิวเตอร์','url' => ['/com-type']],
    ];
       $regist = [
                ['label' => 'ทะเบียนคอมพิวเตอร์', 'url' => ['/com']], ];
       
             $report = [
                ['label' => 'รายงานความพิวเตอร์', 'url' => ['/reportcomtype']],
                ['label' => 'รายงานปัญหาคอมพิวเตอร์', 'url' => ['/reportcomservice']],
                ['label' => 'กราฟสรุปรายงานคอมพิวเตอร์', 'url' => ['/chartcom']],
              
            ];
    
    
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => FALSE,
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home"</span> หน้าแรก', 'url' => ['/site/index']],
               ['label' => '<span class="glyphicon glyphicon-pencil"</span> ลงทะเบียน', 'items' =>$regist],
           ['label' => '<span class="glyphicon glyphicon-list-alt"</span> ระบบรายงาน', 'items' =>$report],
             ['label' => '<span class="glyphicon glyphicon-play"</span> ทดสอบ', 'url' => ['/first1']],
            ['label' => '<span class="glyphicon glyphicon-cog"</span> ตั้งค่าระบบ', 'items' =>$setting],
            Yii::$app->user->isGuest ? (
                ['label' => '<span class="glyphicon glyphicon-transfer"</span> ล็อกอิน', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>