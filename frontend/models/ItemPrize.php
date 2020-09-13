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
 * @property $prize;
 * @property $amount;
 * @property $is_enabled;
 */
class ItemPrize extends ActiveRecord implements ItemInterface
{


	public static function tableName()
	{
		return '{{%balance}}';
	}

	public function rules()
	{
		return [
			[['id', 'type', 'prize', 'amount', 'is_enabled'], 'safe']
		];
	}

	public static function findOneAvailable()
	{
		$prize = parent::findOne(['type' => 2, 'is_enabled' => true]);
		if (empty($prize)) {
			throw new NotAvailablePrizeException();
		}
		return $prize;
	}

	public static function checkOneAvailable()
	{
		$prize = parent::findOne(['type' => 2, 'is_enabled' => true]);
		if (empty($prize)) {
			throw new NotAvailablePrizeException();
		}
		return $prize;
	}
	/**
	 * переопределить метод одного приза с условиями, что тип 2 а доступность тру
	 * если таких нет, вернуть NotAvailablePrizeException
	 *
	 * Другой метод: матод по id проверить, что все еще доступно.
	 *
	 *
	 * Метод: отнятия эмоут(колличества) вещей, если после отнятия = 0, то ставить изэвэйлбл = 0
	 *
	 */

}