<?php

namespace frontend\enums;


class PrizeTypeEnum
{
	const BONUS = 0;
	const MONEY = 1;
	const ITEM = 2;

	const BONUS_LIT = 'bonus';
	const MONEY_LIT = 'money';
	const ITEM_LIT = 'item';

	/**
	 * @param int $id
	 * @return string
	 */
	public static function literalBy(int $id)
	{
		$list = [self::BONUS_LIT, self::MONEY_LIT, self::ITEM_LIT];
		return $list[$id];
	}

}