<?php

namespace frontend\repositories;

use frontend\enums\PrizeTypeEnum;
use frontend\enums\UserWonStatusEnum;
use frontend\exception\NotAvailablePrizeException;
use frontend\helpers\ActiveRecordHelper;
use frontend\interfaces\repositories\UserWonRepositoryInterface;
use frontend\models\Bonus;
use frontend\models\UserWon;
use frontend\services\BonusService;
use http\Exception\InvalidArgumentException;
use yii\data\ActiveDataProvider;
use yii\db\Exception as DbException;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;

class UserWonRepository implements UserWonRepositoryInterface
{
	/**
	 * @param $userWonId
	 */
	public function accept($userWonId){
		$userWon = UserWon::findOne($userWonId);
		if($userWon->balance->type != PrizeTypeEnum::BONUS) {
			$responseBalance = \Yii::$app->balance->removeGiftAmountFromBalance($userWon->prize_id, $userWon->amount);
		}
		if ($responseBalance == true) {
			$this->updateStatus($userWon, UserWonStatusEnum::ACCEPTED);
		} else {
			throw new NotAvailablePrizeException('Вы не успели, кто-то опередил вас и забрал приз быстрее');
		}
	}

	/**
	 * @param $userWonId
	 */
	public function cancel($userWonId){
		$userWon = UserWon::findOne($userWonId);
		$this->updateStatus($userWon, UserWonStatusEnum::CANCELED);
	}

	/**
	 * @param $userWonId
	 * @return mixed
	 */
	public function convertationMoney($userWonId)
	{
		$userWon = UserWon::findOne($userWonId);
		$bonusAmount = floor($userWon->amount*UserWon::CONVERSION_COEFFICIENT);
		\Yii::$app->bonus->createConvertedGift($bonusAmount);
		$this->updateStatus($userWon, UserWonStatusEnum::CONVERTED);

		return $bonusAmount;
	}

	/**
	 * @param array $condition
	 * @return ActiveDataProvider
	 * @throws NotFoundHttpException
	 * @throws UnprocessableEntityHttpException
	 */
	public function all(array $condition = []): ActiveDataProvider
	{
	try {
		$giftDataProvider = new ActiveDataProvider([
			'query' => ActiveRecordHelper::createQuery(new UserWon(), $condition)
		]);
		if ($giftDataProvider->count > 0) {
			return $giftDataProvider;
		}
		throw new NotFoundHttpException();
	} catch (DbException $e) {
		throw new UnprocessableEntityHttpException('Problem with getting gift list');
	}
}

	/**
	 * @param $userWon
	 * @param $status
	 */
	private function updateStatus($userWon, $status){
		if(!in_array($status, UserWon::ACCEPTED_STATUSES)){
			throw new InvalidArgumentException('status is not available');
		}
		$userWon->status = $status;
		$userWon->save();
	}
}