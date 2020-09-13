<?php


namespace frontend\interfaces;


use frontend\interfaces\prize\BonusInterface;

interface BonusServiceInterface
{
	public function oneAvailable(): BonusInterface;

}