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
	 * @param $prize_id
	 * @param $amount
	 */
	public function removeGiftAmountFromBalance($prize_id, $amount);


}