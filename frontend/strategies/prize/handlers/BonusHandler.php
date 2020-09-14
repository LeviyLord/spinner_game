<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\UserWonInterface;

class BonusHandler implements HandlerInterface
{
	/**
	 * @return UserWonInterface
	 */
	public function getAvailable(): UserWonInterface
	{
		$prizeItem =\Yii::$app->bonus->oneAvailable();
		return $prizeItem;
	}
}