<?php

namespace frontend\strategies\prize;



use frontend\enums\PrizeTypeEnum;
use frontend\strategies\BaseStrategyContextHandlers;
use frontend\strategies\prize\handlers\BonusHandler;
use frontend\strategies\prize\handlers\HandlerInterface;
use frontend\strategies\prize\handlers\ItemHandler;
use frontend\strategies\prize\handlers\MoneyHandler;

/**
 * Class PrizeStrategy
 *
 * @property-read HandlerInterface $strategyInstance
 */
class PrizeStrategy extends BaseStrategyContextHandlers
{

	/**
	 * @return array
	 */
	public function getStrategyDefinitions()
	{
		return [
			PrizeTypeEnum::BONUS_LIT => BonusHandler::class,
			PrizeTypeEnum::MONEY_LIT => MoneyHandler::class,
			PrizeTypeEnum::ITEM_LIT => ItemHandler::class,
		];

	}

	/**
	 * @return mixed
	 */
	public function getAvailable()
	{
		return $this->strategyInstance->getAvailable();
	}
	
}