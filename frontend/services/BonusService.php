<?php

namespace frontend\services;

use frontend\enums\UserWonStatusEnum;
use frontend\interfaces\services\BonusServiceInterface;
use frontend\interfaces\prize\BonusInterface;
use frontend\interfaces\prize\PrizeInterface;
use frontend\interfaces\UserWonInterface;
use frontend\models\Bonus;
use frontend\models\Money;
use frontend\models\UserWon;
use Yii;

class BonusService extends AbstractPrizeService implements BonusServiceInterface
{
	/**
	 * @return UserWonInterface
	 */
	public function oneAvailable(): UserWonInterface
	{
		$bonusPrize = Bonus::findOneAvailable();
		return $this->createFromPrize($bonusPrize);
	}


	/**
	 * @param $bonusAmount
	 */
	public function createConvertedGift($bonusAmount)
	{
		$bonusPrize = Bonus::findOneAvailable();
		$bonusPrize->amount = $bonusAmount;
		$this->createFromPrize($bonusPrize, UserWonStatusEnum::ACCEPTED);
	}

}