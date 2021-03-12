<?php


namespace frontend\interfaces\repositories;


use frontend\models\UserWon;

interface PostRepositoryInterface
{
	public function initiate(UserWon $userGift);
}