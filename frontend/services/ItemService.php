<?php

namespace frontend\services;


use frontend\interfaces\services\ItemServiceInterface;
use frontend\interfaces\prize\ItemInterface;
use frontend\interfaces\UserWonInterface;
use frontend\models\ItemPrize;

class ItemService extends AbstractPrizeService implements ItemServiceInterface
{

	/**
	 * @return UserWonInterface
	 * @throws \frontend\exception\NotAvailablePrizeException
	 */
	public function oneAvailable(): UserWonInterface
	{
		$itemPrize = ItemPrize::findOneAvailable();

		return $this->createFromPrize($itemPrize);
	}
}