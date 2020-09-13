<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\prize\BonusInterface;
use frontend\interfaces\UserWonInterface;

class BonusHandler implements HandlerInterface
{
	public function getAvailable(): UserWonInterface
	{
		$prizeItem =\Yii::$app->bonus->oneAvailable();
		return $prizeItem;
	}
}