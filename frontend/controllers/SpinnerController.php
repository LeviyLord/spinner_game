<?php


namespace frontend\controllers;


use frontend\enums\PrizeTypeEnum;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class SpinnerController
 *
 * @property-read  \frontend\interfaces\BalanceInterface $balance
 */
class SpinnerController extends Controller
{

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'only' => ['index'],
				'rules' => [
					[
						'actions' => ['index'],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::class,
				'actions' => [
					'index' => ['GET'],
				],
			],
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionIndex()
	{
		$userWon = \Yii::$app->balance->getPrize();


		return $this->render('index', [
			'userWon' => $userWon,
			'showAmount' => $userWon->balance->type != PrizeTypeEnum::ITEM
		]);

	}
	/**
		* Записать в таблицу юзер_вон приз полученный игроком
		*
		* или не получилось записать приз на счет юзера
	 */



}