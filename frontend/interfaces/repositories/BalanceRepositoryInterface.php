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
	 * @param $userWon
	 */
	public function acceptWon($userWon);

}
