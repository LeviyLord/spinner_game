<?php

namespace frontend\models;

use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\prize\MoneyInterface;

use yii\db\ActiveRecord;


/**
 * Class Money
 *
 * @property int $id;
 * @property $type;
 * @property $title;
 * @property $amount;
 * @property $is_enabled;
 */
class Money extends ActiveRecord implements MoneyInterface
{
	const MIN_SUM_MONEY = 6;

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
		$prize = parent::findOne(['type' => 1, 'is_enabled' => true]);
		if (empty($prize)) {
			throw new NotAvailablePrizeException();
		}
		$randAmount = rand(self::MIN_SUM_MONEY, $prize->amount);
		$prize->amount = $randAmount;
		return $prize;
	}

	/**
	 * @throws NotAvailablePrizeException
	 * @throws \Throwable
	 * @throws \yii\db\StaleObjectException
	 */
	public function checkCapacity()
	{
		if ($this->amount < 5) {
			$this->is_enabled = false;
			$this->update();
			throw new NotAvailablePrizeException();
		}
	}

}