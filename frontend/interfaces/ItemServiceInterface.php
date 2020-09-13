<?php


namespace frontend\interfaces;


use frontend\interfaces\prize\ItemInterface;

interface ItemServiceInterface
{
	public function oneAvailable(): ItemInterface;

}