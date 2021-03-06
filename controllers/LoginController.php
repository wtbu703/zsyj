<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\common\Common;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\controllers\UserController;

class LoginController extends Controller
{
	public $layout = false;
	public $enableCsrfValidation = false;
	/*
	 * @author liuyao
	 * @date 2016-3-23
	 * @function跳转到后台登录页
	 */
	public function actionIndex()
	{
		$user = new User();
		return $this->render('login',[
			'user' => $user,
		]);
	}

	/*
	 * @author liuyao
	 * @date 2016-3-23
	 * @function登录验证
	 */
	public function actionLogin(){
		$username = Yii::$app->request->post('username');
		$password = Yii::$app->request->post('password');
		$userCode = Yii::$app->request->post('userCode');
		if(strtolower(Yii::$app->session['userCode']) == strtolower($userCode)){
			$usersStr = User::find()
					->where(('username = :username and password = :password and userType = "2"'),[':username' => $username,':password' => Common::hashMD5($password)]);
			$usersCount = $usersStr->count();
			$user = $usersStr->one();
			if($usersCount == 0){
				return 'failure';
			}else{
				Yii::$app->session['username'] = $username;
				Yii::$app->session['userId'] = $user->id;
				Yii::$app->session['truename'] = $user->truename;
				Yii::$app->session['userType'] = $user->userType;
				Yii::$app->session['roleId'] = $user->roleId;
				Yii::$app->session->remove('userCode');
				return 'success';
			}

		}else{
			return 'codeWrong';
		}

	}

	/*
	 * @author liuyao
	 * @date 2016-3-26
	 * @function退出
	 */
	public function actionLogout(){
		Yii::$app->session->remove('username');
		Yii::$app->session->remove('userId');
		Yii::$app->session->remove('truename');
		Yii::$app->session->remove('userType');
		Yii::$app->session->remove('roleId');
		return $this->render('login');
	}

	/*
	 * @author liuyao
	 * @date 2016-3-26
	 * @function锁屏
	 */
	public function actionLock(){
		Yii::$app->session->remove('username');
		Yii::$app->session->remove('userId');
		Yii::$app->session->remove('truename');
		Yii::$app->session['times'] = 0;
		return 'success';
	}

	/*
	 * @author liuyao
	 * @date 2016-3-26
	 * @function解屏
	 */
	public function actionUnlock(){
		$username = Yii::$app->request->post('username');
		$password = Yii::$app->request->post('password');

		$usersStr = User::find()
				->where(('username = :username and password = :password'),[':username' => $username,':password' => Common::hashMD5($password)]);
		$usersCount = $usersStr->count();
		$user = $usersStr->one();
		if($usersCount == 0){
			Yii::$app->session['times'] = Yii::$app->session['times'] + 1;
			if(Yii::$app->session['times'] > 3){
				Yii::$app->session->remove('times');
				return '3';
			}
			return 'failure';
		}else{
			Yii::$app->session['username'] = $username;
			Yii::$app->session['userId'] = $user->id;
			Yii::$app->session['truename'] = $user->truename;
			Yii::$app->session->remove('times');
			return '1';
		}
	}
	/*
	 * @author liuyao
	 * @date 2016-3-23
	 * @function生成验证码
	 */
	public function actions()
	{
		return  [
				'captcha' => [
						'class' => 'yii\captcha\CaptchaAction',
						//'fixedVerifyCode' => YII_ENV ? 'testme' : null,
						//'backColor'=>0x000000,//背景颜色
						'maxLength' => 4, //最大显示个数
						'minLength' => 4,//最少显示个数
						'padding' => 3,//间距
						'height'=>42,//高度
						'width' => 120,  //宽度
						//'foreColor'=>0xffffff,     //字体颜色
						'offset'=>2,        //设置字符偏移量 有效果
				],
		];
	}
}