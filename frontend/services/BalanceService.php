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
	 * @param $userWon
	 */
	public function acceptWon($userWon){
		return $this->repository->acceptWon($userWon);
	}
}