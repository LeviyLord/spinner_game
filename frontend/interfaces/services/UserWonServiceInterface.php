<?php


namespace frontend\interfaces\services;


use yii\data\ActiveDataProvider;

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

	/**
	 * @param $userWonId
	 * @return mixed
	 */
	public function convertationMoney($userWonId);

	/**
	 * @param array $condition
	 * @return ActiveDataProvider
	 */
	public function all($condition = []);

}