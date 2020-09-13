<?php

namespace frontend\services;


use frontend\interfaces\ItemServiceInterface;
use frontend\interfaces\prize\ItemInterface;
use frontend\models\ItemModel;

class ItemService extends AbstractPrizeService implements ItemServiceInterface
{

	/**
	 * @return ItemInterface
	 */
	public function oneAvailable(): ItemInterface
	{
		return ItemModel::findOneAvailable();
	}
}