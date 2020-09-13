<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\prize\ItemInterface;
use frontend\models\ItemModel;
use function Webmozart\Assert\Tests\StaticAnalysis\true;

class ItemHandler implements HandlerInterface
{
	/**
	 * @return mixed
	 */
	public function getAvailable()
	{
		$prizeItem =\Yii::$app->item->oneAvailable();
		if($prizeItem instanceof ItemInterface)
		return $prizeItem;
	}
}