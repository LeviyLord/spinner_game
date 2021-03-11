<?php


namespace frontend\services;


use frontend\interfaces\repositories\BalanceRepositoryInterface;
use frontend\interfaces\services\BalanceServiceInterface;

/**
 * Class BalanceService
 *
 * @property-read BalanceRepositoryInterface $repository
 */
class BalanceService implements BalanceServiceInterface
{
	public $repository;

	/**
	 * @return mixed
	 */
	public function getPrize(){
		return $this->repository->getPrize();
	}

	/**
	 * @param $prize_id
	 * @param $amount
	 */
	public function removeGiftAmountFromBalance($prize_id, $amount){
		return $this->repository->removeGiftAmountFromBalance($prize_id, $amount);
	}
}