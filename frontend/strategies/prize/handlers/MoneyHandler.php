<?php

namespace frontend\strategies\prize\handlers;

use frontend\interfaces\prize\MoneyInterface;



class MoneyHandler implements HandlerInterface
{
	public function getAvailable() : MoneyInterface
	{
		$prizeItem =\Yii::$app->money->oneAvailable();
		return $prizeItem;
	}


}