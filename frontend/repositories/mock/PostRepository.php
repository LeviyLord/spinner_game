<?php

namespace frontend\repositories\mock;

use frontend\interfaces\repositories\PostRepositoryInterface;
use frontend\models\UserWon;

class PostRepository implements PostRepositoryInterface
{
	public function initiate(UserWon $userGift)
	{
		return true;
	}
}