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
	private $prizes = [0, 1, 2];

	public function getPrize() {
		try {
			$prizeType = $this->getPrizeType();
			$prizeStrategy = new PrizeStrategy();
			$prizeStrategy->setStrategyName($prizeType);
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
	private function getPrizeType(){

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
	 * @param UserWon $userWon
	 * @return bool|null
	 */
	public function acceptWon($userWon) {
		$prize = Balance::findOne($userWon->prize_id);
		if ($prize->type == PrizeTypeEnum::MONEY) {
			return $this->reduceMoney($prize, $userWon);
		}
		if ($prize->type == PrizeTypeEnum::ITEM) {
			return $this->reduceItem($prize, $userWon);
		}

		return false;
	}


	/**
	 * @param Balance $prize
	 * @param UserWon $userWon
	 * @return bool
	 */
	private function reduceMoney($prize, $userWon) {
		if ($prize->amount < $userWon->amount) {
			return false;
		}
		$prize->amount -= $userWon->amount;
		if ($prize->amount == 0) {
			$prize->is_enabled = false;
		}
		$prize->save();
		return true;
	}

	private function reduceItem($prize, $userWon) {
		if ($prize->amount < $userWon->amount) {
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