<?php

namespace frontend\repositories;

use frontend\enums\PrizeTypeEnum;
use frontend\enums\UserWonStatusEnum;
use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\repositories\BalanceRepositoryInterface;
use frontend\models\Balance;
use frontend\models\UserWon;
use frontend\strategies\prize\PrizeStrategy;
use phpDocumentor\Reflection\Types\Boolean;

class BalanceRepository implements BalanceRepositoryInterface
{
	private $prizes = [
		PrizeTypeEnum::BONUS,
		PrizeTypeEnum::MONEY,
		PrizeTypeEnum::ITEM
	];

	public function getPrize() {
		try {
			$prizeType = $this->getRandomPrizeType();
			$prizeStrategy = new PrizeStrategy($prizeType);
			return $prizeStrategy->getAvailable();
		}
		catch (NotAvailablePrizeException $e){
			unset($this->prizes[PrizeTypeEnum::idBy($prizeType)]);
			return $this->getPrize();
		}
	}

	/**
	 * @return string
	 */
	private function getRandomPrizeType(){

		switch (array_rand ($this->prizes)) {
			case PrizeTypeEnum::BONUS:
				return PrizeTypeEnum::literalBy(PrizeTypeEnum::BONUS);
				break;
			case PrizeTypeEnum::MONEY:
				return PrizeTypeEnum::literalBy(PrizeTypeEnum::MONEY);
				break;
			case PrizeTypeEnum::ITEM:
				return PrizeTypeEnum::literalBy(PrizeTypeEnum::ITEM);
				break;
		}
	}


	/**
	 * @param $prize_id
	 * @param $amount
	 *
	 * @return bool|null
	 */
	public function removeGiftAmountFromBalance($prize_id, $amount) {
		$prize = Balance::findOne($prize_id);
		if ($prize->type == PrizeTypeEnum::MONEY) {
			return $this->reduceMoney($prize, $amount);
		}
		if ($prize->type == PrizeTypeEnum::ITEM) {
			return $this->reduceItem($prize, $amount);
		}

		return false;
	}


	/**
	 * @param Balance $prize
	 * @param $amount
	 *
	 * @return bool
	 */
	private function reduceMoney($prize, $amount) {
		if ($prize->amount < $amount) {
			return false;
		}
		$prize->amount -= $amount;
		if ($prize->amount == 0) {
			$prize->is_enabled = false;
		}
		$prize->save();
		return true;
	}

	/**
	 * @param Balance $prize
	 * @param $amount
	 *
	 * @return bool
	 */
	private function reduceItem($prize, $amount) {
		if ($prize->amount < $amount) {
			return false;
		}
		$prize->amount -= 1;
		if ($prize->amount == 0) {
			$prize->is_enabled = false;
		}
		$prize->save();
		return true;
	}


}