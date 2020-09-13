<?php

namespace frontend\models;

use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\prize\MoneyInterface;
use frontend\interfaces\prize\PrizeInterface;
use frontend\interfaces\UserWonInterface;
use function Webmozart\Assert\Tests\StaticAnalysis\true;
use yii\db\ActiveRecord;

/**
 * Class UserWon
 *
 * @property int $id;
 * @property $user_id;
 * @property $prize_id;
 * @property $status;
 * @property $amount;
 * @property $create_at;
 * @property $update_at;
 */
class UserWon extends ActiveRecord implements UserWonInterface
{

	public static function tableName()
	{
		return '{{%user_won}}';
	}



	public function rules()
	{
		return [
			[['id', 'user_id', 'prize_id', 'status', 'create_at', 'update_at', 'amount'], 'safe']
		];
	}



}