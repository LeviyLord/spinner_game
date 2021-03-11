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
	 * @param int|null $status
	 *
	 * @return UserWonInterface
	 */
	protected  function createFromPrize(PrizeInterface $prize, $status = null): UserWonInterface
	{
		$newUserWon = new UserWon();
		$newUserWon->setAttributes([
			'user_id' => Yii::$app->user->id,
			'prize_id' => $prize->id,
			'amount' => $prize->amount,
			'status' => $status ?? UserWonStatusEnum::APPROVAL,
			'create_at' => date(DATE_W3C),
			'update_at' => date(DATE_W3C),
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