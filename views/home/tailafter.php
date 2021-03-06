<?php
/**
 * Created by PhpStorm.
 * User: liluoao
 * Date: 2016/4/3
 * Time: 12:10
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>紫薯原浆</title>
    <link rel="stylesheet" type="text/css" href="css/home/tails.css" />
    <link rel="stylesheet" type="text/css" href="css/home/base.css">
    <link href="css/home/right_suspend.css" rel="stylesheet" />
    <script src="js/home/jquery-1.8.3.min.js"></script>
    <script>
        var shoppingcartUrl = "<?=yii::$app->urlManager->createUrl('fontadmin/shoppingcart')?>";
        var addshopcartUrl = "<?=yii::$app->urlManager->createUrl('fontadmin/addshopcart')?>";
    </script>
    <script src="js/home/tails.js"></script>
    <script src="js/home/common/share.js"></script>
    <script type="text/javascript" src="js/home/tailafter.js"></script>
</head>
<body>
<?=$this->render('login')?>
<?=$this->render('header',['column'=>'shop'])?>
<!--content部分-->
<div class="content">
    <div class="buy">
        <div id="outer">
            <ul id="inner">
                <li><img  src="images/home/tails/productde1.jpg"  alt=" "></li>
                <li><img src="images/home/tails/productde2.png"  alt=" "></li>
            </ul>
            <div id="left"><</div>
            <div id="right">></div>
        </div>
        <div class="shop">
            <div class="price">
                <h2><span class="weight"><?=$product->productTitle?></span></h2>
                <span class="one">￥</span><span class="two"><?=$product->productPrice*$product->productDiscount?></span><span class="three"><?=$product->productPrice?></span>
                <div class="line" style="margin-top:45.2px;"></div>
            </div>
            <div class="inform">
                <span class="norms">规&nbsp;&nbsp;&nbsp;格</span><span class="number"><?=$product->productSize?></span>
                <div class="nums">
                    <span class="norms">数&nbsp;&nbsp;&nbsp;量</span>
                    <div class="count">
                        <span class="reduce">-</span><input class="num" readonly type="text" value="1"/><span class="add">+</span>
                    </div>
                </div>
                <div class="row_two"><span class="norms">由紫薯原浆发货，满79元免邮费</span></div>
                <div class="row">
                    <span class="numbers">11</span>
                    <span class="black">人已购买</span>
                </div>
                <div class="img_buy"><a href="javascript:buynow('<?=$product->id?>');void(0);"><img src="images/home/tails/buy_after.png" /></a>
                    <div class="buy_car"><a href="javascript:addshopcart('<?=$product->id?>');void(0);"><img src="images/home/tails/shoppingcart_after.png" class="img_click" /></div>
                    <div id="flyItem" class="fly_item"><img src="images/home/fly/shop00.png" width="30" height="45"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="particulars">
        <h1>查看详情</h1>
        <div class="line" style="margin-top:20px;"></div>
        <span class="information">商品信息</span>
        <div class="line" style="margin-bottom:20px;"></div>
        <div class="substance">
            <ul class="first">
                <li>商品名称</li>
                <li>包装类型</li>
            </ul>
            <ul class="second">
                <li><?=$product->productTitle?></li>
                <li><?=$product->productType?></li>
            </ul>
            <div class="box">
                <ul class="first">
                    <li>规格数量</li>
                </ul>
                <ul class="second">
                    <li><?=$product->productSize?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="line" style="margin-top:150px;"></div>
</div>
<!--下面是footer部分-->
<?=$this->render('footer',['color' => ''])?>
<!--分享和侧悬浮-->
<?=$this->render('share')?>
<!--右悬浮-->
<?=$this->render('sidebox')?>
<script src="js/home/parabola.js"></script>
<script src="js/home/firfly.js"></script>
</body>
</html>
