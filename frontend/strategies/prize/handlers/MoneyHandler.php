<?php

namespace frontend\strategies\prize\handlers;

use frontend\interfaces\prize\MoneyInterface;
use frontend\interfaces\UserWonInterface;


class MoneyHandler implements HandlerInterface
{
	/**
	 * @return UserWonInterface
	 */
	public function getAvailable(): UserWonInterface
	{
		$prizeItem = \Yii::$app->money->oneAvailable();
		return $prizeItem;
	}


}