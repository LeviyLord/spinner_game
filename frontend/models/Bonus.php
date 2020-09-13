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


	public static function tableName()
	{
		return '{{%balance}}';
	}

	public static function findOneAvailable()
	{
		$randAmount = rand(self::MIN_SUM_BONUS, self::MAX_SUM_BONUS);
		$prize = parent::findOne(['type' => 0, 'is_enabled' => true]);
		$prize->amount = $randAmount;
		return $prize;
	}

	public static function createBy(int $amount)
	{
		$prize = new self;

		return $prize;
	}

	/**
	 * переопределить метод одного приза с условиями что амоун бесконечный, рандомно выдавать сумму
	 *
	 *
	 * Метод: вернуть объект с заданой суммой
	 *
	 */
}