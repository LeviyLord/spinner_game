<?php


namespace frontend\services;


use frontend\enums\UserWonStatusEnum;
use frontend\interfaces\repositories\UserWonRepositoryInterface;
use frontend\interfaces\services\PostServiceInterface;
use frontend\interfaces\services\UserWonServiceInterface;
use frontend\models\UserWon;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * Class BalanceService
 *
 * @property-read  UserWonRepositoryInterface $repository
 * @property-read  PostServiceInterface $post
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

	/**
	 * @param $userWonId
	 * @return mixed
	 */
	public function convertationMoney($userWonId)
	{
		$bonusAmount = $this->repository->convertationMoney($userWonId);
		return $bonusAmount;
	}

	/**
	 * @param array $condition
	 * @return ActiveDataProvider
	 */
	public function all($condition = []): ActiveDataProvider
	{
		return $this->repository->all($condition);
	}

	public function sendBatch(array $userGifts)
	{
		foreach ($userGifts as $userGift) {
			if (!($userGift instanceof UserWon)) {
				throw new \InvalidArgumentException('not allowed object for shipping');
			}
			if (Yii::$app->post->initiate($userGift)) {
				$userGift->status = UserWonStatusEnum::SENDED;
			};
		}
	}

}