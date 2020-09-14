<?php

namespace frontend\models;

use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\prize\MoneyInterface;

use yii\db\ActiveRecord;


/**
 * Class Balance
 *
 * @property int $id;
 * @property $type;
 * @property $prize;
 * @property $amount;
 * @property $is_enabled;
 */
class Balance extends ActiveRecord
{

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

}