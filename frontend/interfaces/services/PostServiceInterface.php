<?php


namespace frontend\interfaces\services;


use frontend\models\UserWon;

interface PostServiceInterface
{
	public function initiate(UserWon $userGift);
}