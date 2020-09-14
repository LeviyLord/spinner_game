<?php

namespace tests\unit\fixtures;

use common\models\User;
use yii\test\ActiveFixture;

class UserFixture extends ActiveFixture
{
	public $modelClass = User::class;
}