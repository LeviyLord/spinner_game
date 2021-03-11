<?php


namespace frontend\interfaces\services;


interface UserWonServiceInterface
{
	/**
	 * @param $userWonId
	 */
	public function accept($userWonId);

	/**
	 * @param $userWonId
	 */
	public function cancel($userWonId);

}