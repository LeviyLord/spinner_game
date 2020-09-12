<?php

namespace frontend\strategies\prize\handlers;



use frontend\interfaces\prize\PrizeInterface;

interface HandlerInterface
{
	
	public function getAvailable() : PrizeInterface;
	
}
