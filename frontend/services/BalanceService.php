<?php


namespace frontend\services;

use frontend\enums\PrizeTypeEnum;
use frontend\interfaces\BalanceInterface;

/**
 * Class BalanceService
 */
class BalanceService implements BalanceInterface
{

	public $repository;


	/**
	 * Определить тип приза
	 *
	 * Определить доступный приз ()
	 *
	 * Вернуть доступный приз
	 */
	public function getPrize(){
		$prizeType = $this->getPrizeType();



	}

	private function getPrizeType(){
		switch (rand(0, 2)) {
			case PrizeTypeEnum::BONUS:
				return PrizeTypeEnum::literalBy(PrizeTypeEnum::BONUS);
				break;
			case PrizeTypeEnum::MONEY:
				return PrizeTypeEnum::literalBy(PrizeTypeEnum::MONEY);
				break;
			case PrizeTypeEnum::ITEM:
				return PrizeTypeEnum::literalBy(PrizeTypeEnum::ITEM);
				break;
		}
	}

}