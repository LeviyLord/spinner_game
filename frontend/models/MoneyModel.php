<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class MoneyModel extends ActiveRecord
{
	/**
	 * переопределить метод одного приза с условиями, что тип 1 а доступность тру
	 * если таких фалс, вернуть NotAvailablePrizeException
	 *
	 * Другой метод: матод по id проверить, что все еще доступно.
	 *
	 *
	 * Метод: отнятия эмоут(колличества) вещей, если после отнятия = 0, то ставить изэвэйлбл = 0
	 *
	 */

}