<?php


namespace frontend\services;

use frontend\enums\PrizeTypeEnum;
use frontend\enums\UserWonStatusEnum;
use frontend\exception\NotAvailablePrizeException;
use frontend\interfaces\BalanceInterface;
use frontend\models\UserWon;
use frontend\strategies\prize\PrizeStrategy;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

/**
 * Class BalanceService
 */
class BalanceService implements BalanceInterface
{
	private $prizes = [0, 1, 2];

	/**
	 * @return mixed
	 */
	public function getPrize(){
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
	 * @param $userWonId
	 */
	public function accept($userWonId){
		$this->updateStatus($userWonId, UserWonStatusEnum::ACCEPTED);
	}

	/**
	 * @param $userWonId
	 */
	public function cancel($userWonId){
		$this->updateStatus($userWonId, UserWonStatusEnum::CANCELED);
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
	 * @param $userWonId
	 * @param $status
	 */
	private function updateStatus($userWonId, $status){
		$userWon = UserWon::findOne($userWonId);
		$userWon->setStatus($status);
	}
}