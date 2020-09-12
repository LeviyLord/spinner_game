<?php

namespace frontend\strategies\prize;



use frontend\enums\PrizeTypeEnum;
use frontend\strategies\BaseStrategyContextHandlers;
use frontend\strategies\prize\handlers\Bonus;
use frontend\strategies\prize\handlers\HandlerInterface;
use frontend\strategies\prize\handlers\Item;
use frontend\strategies\prize\handlers\Money;

/**
 * Class PrizeStrategy
 *
 * @property-read HandlerInterface $strategyInstance
 */
class PrizeStrategy extends BaseStrategyContextHandlers
{
	
	public function getStrategyDefinitions()
	{
		return [
			PrizeTypeEnum::BONUS_LIT => Bonus::class,
			PrizeTypeEnum::MONEY_LIT => Money::class,
			PrizeTypeEnum::ITEM_LIT => Item::class,
		];

	}
	
	public function getAvailable()
	{
		return $this->strategyInstance->getAvailable();
	}
	
}