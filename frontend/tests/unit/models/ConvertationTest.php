<?php

namespace frontend\tests\unit\models;


use frontend\enums\PrizeTypeEnum;
use frontend\enums\UserWonStatusEnum;
use frontend\models\UserWon;
use tests\unit\fixtures\BalanceFixture;
use tests\unit\fixtures\UserFixture;
use tests\unit\fixtures\UserWonFixture;
use Yii;

class ConvertationTest extends \Codeception\Test\Unit
{
	/**
	 * @var \frontend\tests\UnitTester
	 */
	protected $tester;


	public function _before()
	{
		$this->tester->haveFixtures([
			'user' => [
				'class' => UserFixture::class,
				'dataFile' => codecept_data_dir() . 'user.php'
			],
			'balance' => [
				'class' => BalanceFixture::class,
				'dataFile' => __DIR__ . '/../fixtures/data/balance.php'
			],
			'userWon' => [
				'class' => UserWonFixture::class,
				'dataFile' => __DIR__ . '/../fixtures/data/user_won.php'
			],
		]);
	}

	public function testConvertRight()
	{
		$gift = Yii::$app->userWon->one(['prize_id' => PrizeTypeEnum::MONEY, 'status' => UserWonStatusEnum::APPROVAL]);
		$amount = $gift->amount * UserWon::CONVERSION_COEFFICIENT;
		$this->tester->assertEquals($amount, Yii::$app->userWon->convertationMoney($gift->id));
	}

	public function testConvertWrongType()
	{
		$gift = Yii::$app->userWon->one(['prize_id' => PrizeTypeEnum::ITEM]);
		try {
			Yii::$app->userWon->convertationMoney($gift->id);
		} catch (ConvertForbiddenException $e) {
			$this->tester->assertEquals('You cant convert that type to the same', $e->getMessage());
		}
	}

	public function testConvertWrongStatus()
	{
		$gift = Yii::$app->userWon->one(['prize_id' => PrizeTypeEnum::MONEY, 'status' => UserWonStatusEnum::CONVERTED]);
		try {
			Yii::$app->converter->convert($gift, 1);
		} catch (ConvertForbiddenException $e) {
			$this->tester->assertEquals('You cant convert only new gift', $e->getMessage());
		}
	}
}
