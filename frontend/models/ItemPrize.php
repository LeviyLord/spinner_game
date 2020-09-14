<?php

namespace frontend\models;

use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\prize\ItemInterface;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * Class ItemPrize
 *
 * @property int $id;
 * @property $type;
 * @property $title;
 * @property $amount;
 * @property $is_enabled;
 */
class ItemPrize extends ActiveRecord implements ItemInterface
{
	const COUNT_ITEM = 1;


	/**
	 * @return string
	 */
	public static function tableName()
	{
		return '{{%balance}}';
	}

	/**
	 * @return array
	 */
	public function rules()
	{
		return [
			[['id', 'type', 'title', 'amount', 'is_enabled'], 'safe']
		];
	}

	/**
	 * @return ActiveRecord|null
	 * @throws NotAvailablePrizeException
	 */
	public static function findOneAvailable()
	{
		$prize = parent::findOne(['type' => 2, 'is_enabled' => true]);
		if (empty($prize)) {
			throw new NotAvailablePrizeException();
		}
		$prize->amount = 1;
		return $prize;
	}

	/**
	 * @return ActiveRecord|null
	 * @throws NotAvailablePrizeException
	 */
	public static function checkOneAvailable()
	{
		$prize = parent::findOne(['type' => 2, 'is_enabled' => true]);
		if (empty($prize)) {
			throw new NotAvailablePrizeException();
		}
		return $prize;
	}
}