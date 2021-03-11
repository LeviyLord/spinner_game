<?php

namespace frontend\repositories;

use frontend\enums\PrizeTypeEnum;
use frontend\enums\UserWonStatusEnum;
use frontend\exception\NotAvailablePrizeException;
use frontend\models\UserWon;
use http\Exception\InvalidArgumentException;

class UserWonRepository
{
	/**
	 * @param $userWonId
	 */
	public function accept($userWonId){
		$userWon = UserWon::findOne($userWonId);
		if($userWon->balance->type != PrizeTypeEnum::BONUS) {
			$responseBalance = \Yii::$app->balance->acceptWon($userWon);
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