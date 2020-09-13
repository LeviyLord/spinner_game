<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\prize\BonusInterface;

class BonusHandler implements HandlerInterface
{
	public function getAvailable() : BonusInterface
	{
		$prizeItem =\Yii::$app->bonus->oneAvailable();
		return $prizeItem;
	}
}