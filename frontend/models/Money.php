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
 * @property $prize;
 * @property $amount;
 * @property $is_enabled;
 */
class Money extends ActiveRecord implements MoneyInterface
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
		$prize = parent::findOne(['type' => 1, 'is_enabled' => true]);
		if (empty($prize)) {
			throw new NotAvailablePrizeException();
		}
		return $prize;
	}

	public function checkCapacity()
	{
		if ($this->amount < 5) {
			$this->is_enabled = false;
			$this->update();
			throw new NotAvailablePrizeException();
		}
	}


	/**
	 *
	 * Другой метод: матод по id проверить, что все еще доступно.
	 *
	 *
	 * Метод: отнятия эмоут(колличества) вещей, если после отнятия = 0, то ставить изэвэйлбл = 0
	 *
	 */

}