<?php


namespace frontend\interfaces;


use frontend\interfaces\prize\MoneyInterface;

interface MoneyServiceInterface
{
	public function oneAvailable(): MoneyInterface;

}