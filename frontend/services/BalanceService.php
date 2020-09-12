<?php


namespace frontend\services;

use frontend\enums\PrizeTypeEnum;
use frontend\interfaces\BalanceInterface;
use frontend\strategies\prize\PrizeStrategy;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

/**
 * Class BalanceService
 */
class BalanceService implements BalanceInterface
{

	public $repository;

	private $forbiddenPrizes;

	/**
	 * Определить тип приза
	 *
	 * Определить доступный приз ()
	 *
	 * Вернуть доступный приз
	 */
	public function getPrize(){
		try {
			$prizeType = $this->getPrizeType();
			$prizeStrategy = new PrizeStrategy();
			$prizeStrategy->strategyName($prizeType);
			return $prizeStrategy->getAvailable();
		}
		catch (NotAvailablePrizeException $e){
			return $this->getPrize();
		}
	}

	//TODO SG-6
	private function getPrizeType(){
		rand(0, 2)
		switch () {
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