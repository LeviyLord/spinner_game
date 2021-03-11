<?php

namespace frontend\interfaces\repositories;

/**
 *
 * Interface BalanceRepositoryInterface
 *
 */
interface BalanceRepositoryInterface {

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
