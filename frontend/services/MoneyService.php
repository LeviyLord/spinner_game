<?php

namespace frontend\services;

use frontend\interfaces\MoneyServiceInterface;
use frontend\interfaces\prize\MoneyInterface;
use frontend\interfaces\UserWonInterface;
use frontend\models\Money;
use frontend\models\UserWon;

class MoneyService extends AbstractPrizeService implements MoneyServiceInterface
{


	/**
	 * @return MoneyInterface
	 * @throws \frontend\exception\NotAvailablePrizeException
	 */
	public function oneAvailable(): UserWonInterface
	{
		$moneyPrize = Money::findOneAvailable();
		$moneyPrize->checkCapacity();
		return $this->createFromPrize($moneyPrize);
	}
	/**
	 * @return MoneyInterface
	 * @throws \frontend\exception\NotAvailablePrizeException
	 */
	public function checkIsAvailable(): MoneyInterface
	{
		$moneyPrize = Money::findOneAvailable();
		$moneyPrize->checkCapacity();
		return $moneyPrize;
	}
}