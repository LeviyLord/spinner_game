<?php


namespace frontend\services;


use frontend\interfaces\repositories\UserWonRepositoryInterface;
use frontend\interfaces\services\UserWonServiceInterface;

/**
 * Class BalanceService
 *
 * @property-read  UserWonRepositoryInterface $repository
 */
class UserWonService implements UserWonServiceInterface
{
	/**
	 * Реализовать метод создания записи в таблицу
	 *
	 * Реализовать метод получения записи по параметрам
	 *
	 *
	 */

	/**
	 * @param $userWonId
	 */
	public function accept($userWonId){
		$this->repository->accept($userWonId);
	}

	/**
	 * @param $userWonId
	 */
	public function cancel($userWonId){
		$this->repository->cancel($userWonId);
	}

}