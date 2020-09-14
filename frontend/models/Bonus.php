<?php

namespace frontend\models;

use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\prize\BonusInterface;
use yii\db\ActiveRecord;


/**
 * Class ItemPrize
 *
 * @property int $id;
 * @property $type;
 * @property $title;
 * @property $amount;
 * @property $is_enabled;
 */
class Bonus extends ActiveRecord implements BonusInterface
{
	const MIN_SUM_BONUS = 100;
	const MAX_SUM_BONUS = 2000;


	/**
	 * @return string
	 */
	public static function tableName()
	{
		return '{{%balance}}';
	}

	/**
	 * @return ActiveRecord|null
	 */
	public static function findOneAvailable()
	{
		$randAmount = rand(self::MIN_SUM_BONUS, self::MAX_SUM_BONUS);
		$prize = parent::findOne(['type' => 0, 'is_enabled' => true]);
		$prize->amount = $randAmount;
		return $prize;
	}

	/**
	 * @param int $amount
	 * @return Bonus
	 */
	public static function createBy(int $amount)
	{
		$prize = new self;

		return $prize;
	}

}