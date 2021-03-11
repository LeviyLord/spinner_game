<?php


namespace frontend\interfaces\services;

/**
 *
 * Interface BalanceServiceInterface
 *
 */
interface BalanceServiceInterface
{

	/**
	 * @return mixed
	 */
	public function getPrize();

	/**
	 * @param $userWon
	 */
	public function acceptWon($userWon);


}