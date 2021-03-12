<?php

namespace frontend\helpers;

use yii\db\ActiveRecord;

class ActiveRecordHelper
{
	const OPTION_DICTIONARY = [
		'limit',
		'offset',
		'order',
		'with'
	];

	public static function createQuery(ActiveRecord $modelClass, $conditions = [])
	{
		$activeQuery = $modelClass::find();
		$activeQuery->where($conditions);
		if (isset($options['limit'])) {
			$activeQuery->limit($options['limit']);
		}
		if (isset($options['offset'])) {
			$activeQuery->offset($options['offset']);
		}
		if (isset($options['order'])) {
			$activeQuery->orderBy($options['order']);
		}
		if (isset($options['with'])) {
			$activeQuery->with($options['with']);
		}

		return $activeQuery;

	}
}