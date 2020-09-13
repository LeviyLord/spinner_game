<?php

namespace frontend\services;

use frontend\enums\UserWonStatusEnum;
use frontend\interfaces\BonusServiceInterface;
use frontend\interfaces\prize\BonusInterface;
use frontend\interfaces\prize\PrizeInterface;
use frontend\interfaces\UserWonInterface;
use frontend\models\Bonus;
use frontend\models\Money;
use frontend\models\UserWon;
use Yii;

class BonusService extends AbstractPrizeService implements BonusServiceInterface
{
	const COEFFICIENT = 0.8;

	/**
	 * @return BonusInterface
	 */
	public function oneAvailable(): UserWonInterface
	{
		$bonusPrize = Bonus::findOneAvailable();
		return $this->createFromPrize($bonusPrize);
	}

	public function convertationMoney($userWon)
	{
		$moneyPrize = Bonus::createBy($userWon->amount);
		$this->updateStatusFromPrize($moneyPrize, UserWonStatusEnum::CONVERTED);
		$this->createFromPrize($bonusPrize);
		return $bonusPrize;
	}

}