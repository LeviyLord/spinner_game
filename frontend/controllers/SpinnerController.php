<?php


namespace frontend\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Class SpinnerController
 *
 * @property-read  \frontend\interfaces\BalanceInterface $service
 */
class SpinnerController extends Controller
{
	public $service;

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
		try {
			$prize = $this->service->getPrize();
		}
		catch (\Exception $e){

		}
		/**
		 *
		 * запустить сервис с запросом доступный приз

		 * трай кетч, на то что не удалось получить приз
		 * флеш месадж, что не получилось получить приз
		 * и вернуть на индекс

		 *
		 *
		*/
		return $this->render('');

	}
	/**
		* Записать в таблицу юзер_вон приз полученный игроком
		*
		* или не получилось записать приз на счет юзера
	 */



}