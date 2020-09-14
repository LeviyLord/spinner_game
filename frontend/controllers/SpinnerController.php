<?php


namespace frontend\controllers;


use frontend\enums\PrizeTypeEnum;
use yii\base\InvalidArgumentException;
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

	/**
	 * @return array
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'only' => ['index'],
				'rules' => [
					[
						'actions' => ['index', 'accept', 'cancel'],
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

	/**
	 * @return array
	 */
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

	/**
	 * @return string
	 */
	public function actionIndex()
	{
		$userWon = \Yii::$app->balance->getPrize();


		return $this->render('index', [
			'userWon' => $userWon,
			'showAmount' => $userWon->balance->type != PrizeTypeEnum::ITEM
		]);

	}

	/**
	 * @param int $userWonId
	 * @return \yii\web\Response
	 */
	public function actionAccept(int $userWonId)
	{
		$success = true;
		$message = \Yii::t('spinner', 'Balance accepted successfully');
		try{
			\Yii::$app->balance->accept($userWonId);
		} catch (InvalidArgumentException $e){
			$success = false;
			$message = $e->getMessage();
		}
		\Yii::$app->session->setFlash('response', compact('success','message'));
		return $this->redirect('/');
	}

	/**
	 * @param int $userWonId
	 * @return \yii\web\Response
	 */
	public function actionCancel(int $userWonId)
	{
		$success = true;
		$message = \Yii::t('spinner', 'Balance canceled successfully');
		try{
			\Yii::$app->balance->cancel($userWonId);
		} catch (InvalidArgumentException $e){
			$success = false;
			$message = $e->getMessage();
		}
		\Yii::$app->session->setFlash('response', compact('success','message'));
		return $this->redirect('/');
	}


}