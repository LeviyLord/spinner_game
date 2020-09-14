<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\prize\ItemInterface;
use frontend\interfaces\UserWonInterface;

class ItemHandler implements HandlerInterface
{

	/**
	 * @return UserWonInterface
	 */
	public function getAvailable(): UserWonInterface
	{
		$prizeItem =\Yii::$app->item->oneAvailable();
		return $prizeItem;
	}
}