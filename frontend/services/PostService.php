<?php

namespace frontend\services;

use frontend\interfaces\repositories\PostRepositoryInterface;
use frontend\interfaces\services\PostServiceInterface;
use frontend\models\UserWon;

/**
 * Class PostService
 *
 * @property-read PostRepositoryInterface $repository
 */
class PostService implements PostServiceInterface
{

	public function initiate(UserWon $userGift)
	{
		return $this->repository->initiate($userGift);
	}
}