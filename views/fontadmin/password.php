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
	<title>修改密码</title>
	<link rel="stylesheet" type="text/css" href="css/home/password.css"/>
	<script src="js/home/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/home/password.js"></script>
	<link rel="stylesheet" type="text/css" href="css/home/base.css">
	<link rel="stylesheet" type="text/css" href="css/home/aside_base.css" />
	<script>
		var checkpasswordUrl = "<?=yii::$app->urlManager->createUrl('fontadmin/checkpassword')?>";
		var passwordUrl = "<?=yii::$app->urlManager->createUrl('fontadmin/password')?>";
		var verifyCodeUrl = "<?=yii::$app->urlManager->createUrl('home/captcha')?>";
	</script>
</head>
<body>

	<!--头部开始-->
	<?=$this->render('..\home\header',['column'=>'shop'])?>
	<!--头部结束-->
	<div class="content">
		<div class="content_top">
			<div class="content_nav">
				<a href="<?=yii::$app->urlManager->createUrl('fontadmin/personaldata')?>">我的紫薯</a><span>></span><a href="<?=yii::$app->urlManager->createUrl('fontadmin/password')?>">账户安全</a></div>
			<div class="content_line"></div>
		</div>
		<div class="big">
			<div class="aside">
				<div class="aside_title">我的紫薯</div>
				<ul>
					<li><a href="<?=yii::$app->urlManager->createUrl('fontadmin/personaldata')?>">个人资料</a></li>
					<li><a href="<?=yii::$app->urlManager->createUrl('fontadmin/password')?>" class="now">修改密码</a></li>
					<li><a href="<?=yii::$app->urlManager->createUrl('fontadmin/addressafter')?>">收货地址</a></li>
					<li><a href="<?=yii::$app->urlManager->createUrl('fontadmin/mymessages')?>">我的留言</a></li>
					<li><a href="<?=yii::$app->urlManager->createUrl('fontadmin/orderafter')?>">我的订单</a></li>
				</ul>
			</div>
            <div class="order_details">
               <div class="modify">
                  <span>修改密码</span>
               </div>
               <div class="pass">
                  <div class="password_1">
                     <span class="pass1">原密码：</span>
                 	 <span class="pass2">新密码：</span>
                 	 <span class="pass3">确认密码：</span>
                 	 <span class="pass2">验证码：</span>
                   </div>
                 <form class="form">
                 	<input type="password" class="aside_1" id="r_password"/>
                 	<input type="password" placeholder="6-20个字符" class="aside_2" id="r_password2"/>
                 	<input type="password" class="aside_2" id="r_password3"/>
                 	<input type="text" class="aside_3" id="verification"/>
				 	<img id="certImg" class="verify" src="<?=yii::$app->urlManager->createUrl('home/captcha')?>"  onclick= "this.src='<?=yii::$app->urlManager->createUrl('login/captcha')?>&d='+Math.random();" title="请输入此验证码，如看不清请点击刷新。" alt="请输入此验证码，如看不清请点击刷新。" style="cursor:pointer" width="70" height="24" />
                 </form>
                 <button type="submit" class="submit" />
                   <a href="javascript:send();void(0);">提交</a>
				   <div id="t_password" class="mima"></div>
				   <div id="t_password2" class="hint"></div>
				   <div id="t_password3" class="what"></div>
				   <div id="t_veryCode" class="user_verification"></div>
               </div>
            </div>
         </div>
    </div>
	<!--下面是footer部分-->
	<?=$this->render('..\home\footer',['color' => '#f7f7f7'])?>
	<!--分享和侧悬浮-->
	<?=$this->render('..\home\share')?>
	<!--右悬浮-->
	<?=$this->render('..\home\sidebox')?>
</body>
</html>
