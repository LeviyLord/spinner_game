<?php


namespace frontend\services;


use frontend\enums\UserWonStatusEnum;
use frontend\interfaces\prize\PrizeInterface;
use frontend\interfaces\UserWonInterface;
use frontend\models\UserWon;
use Yii;

abstract class AbstractPrizeService
{
	/**
	 * @param PrizeInterface $prize
	 * @return UserWonInterface
	 */
	protected  function createFromPrize(PrizeInterface $prize): UserWonInterface
	{
		$newUserWon = new UserWon();
		$newUserWon->setAttributes([
			'user_id' => Yii::$app->user->id,
			'prize_id' => $prize->id,
			'amount' => $prize->amount,
			'status' => UserWonStatusEnum::APPROVAL,
			'create_at' => date(DATE_ISO8601),
			'update_at' => date(DATE_ISO8601),
		]);
		$newUserWon->save();
		return $newUserWon;
	}

	/**
	 * @param PrizeInterface $prize
	 * @param $status
	 * @return UserWonInterface
	 */
	protected  function updateStatusFromPrize(PrizeInterface $prize, $status): UserWonInterface
	{
		$newUserWon->find();

		$newUserWon->save();
		return $newUserWon;
	}

	/**
	 * @return UserWonInterface
	 */
	abstract public function oneAvailable(): UserWonInterface;
}