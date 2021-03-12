<?php

namespace yii\console\controllers;

use frontend\enums\PrizeTypeEnum;
use frontend\enums\UserWonStatusEnum;
use Yii;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\Console;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;

/**
 * Class SpinnerController
 *
 * @property-read  \frontend\interfaces\services\UserWonServiceInterface $userWon
 */
class SpinnerController extends Controller
{
	public $count;

	public function options($actionID)
	{
		return ['count'];
	}

	public function actionSend()
	{
		try {
			$giftDataProvider = Yii::$app->userWon->all(
				[
				'status' => UserWonStatusEnum::ACCEPTED,
				'type' => PrizeTypeEnum::MONEY
				],
				['limit' => $this->count]);
			Yii::$app->userWon->sendBatch($giftDataProvider->getModels());
		} catch (NotFoundHttpException $e) {
			throw new Exception('No records to send');
		} catch (UnprocessableEntityHttpException $e) {
			throw new Exception($e);
		} catch (\Exception $e) {
			throw new Exception($e);
		}
		Console::output('sended gifts');
		foreach ($giftDataProvider->getModels() as $userWon) {
			Console::output('Gift - ' . $userWon->id . ' amount - ' . $userWon->amount);
		}

	}

}