<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\prize\ItemInterface;

class ItemHandler implements HandlerInterface
{
	/**
	 * @return mixed
	 */
	public function getAvailable() : ItemInterface
	{
		$prizeItem =\Yii::$app->item->oneAvailable();
		return $prizeItem;
	}
}