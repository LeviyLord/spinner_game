<?php


namespace frontend\interfaces\repositories;


interface UserWonRepositoryInterface
{
	/**
	 * @param $userWonId
	 */
	public function accept($userWonId);

	/**
	 * @param $userWonId
	 */
	public function cancel($userWonId);

	/**
	 * @param $userWonId
	 * @return mixed
	 */
	public function convertationMoney($userWonId);

}