<?php

namespace frontend\services;


use frontend\interfaces\ItemServiceInterface;
use frontend\interfaces\prize\ItemInterface;
use frontend\models\ItemPrize;

class ItemService extends AbstractPrizeService implements ItemServiceInterface
{

	/**
	 * @return ItemInterface
	 */
	public function oneAvailable(): ItemInterface
	{
		$itemPrize = ItemPrize::findOneAvailable();
		$this->createFromPrize($itemPrize);
		return $itemPrize;
	}
}