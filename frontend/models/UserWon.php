<?php

namespace frontend\models;

use frontend\enums\UserWonStatusEnum;
use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\prize\MoneyInterface;
use frontend\interfaces\prize\PrizeInterface;
use frontend\interfaces\UserWonInterface;
use http\Exception\InvalidArgumentException;
use phpDocumentor\Reflection\Types\Self_;
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

	const ACCEPTED_STATUSES = [
		UserWonStatusEnum::ACCEPTED,
		UserWonStatusEnum::CANCELED,
		UserWonStatusEnum::CONVERTED,
		UserWonStatusEnum::APPROVAL
	];
	const CONVERSION_COEFFICIENT = 1.2;
	/**
	 * @return string
	 */
	public static function tableName()
	{
		return '{{%user_won}}';
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getBalance()
	{
		return $this->hasOne(Balance::class, ['id' => 'prize_id']);
	}

	/**
	 * @return array
	 */
	public function rules()
	{
		return [
			[['id', 'user_id', 'prize_id', 'status', 'create_at', 'update_at', 'amount'], 'safe']
		];
	}

}