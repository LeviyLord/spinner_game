<?php

use frontend\repositories\BalanceRepository;
use frontend\repositories\UserWonRepository;
use frontend\services\BalanceService;
use frontend\services\BonusService;
use frontend\services\ItemService;
use frontend\services\MoneyService;
use frontend\services\UserWonService;

$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'controllerNamespace' => 'frontend\controllers',
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend',
		],
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
			],
		],
		'balance' => [
			'class' => BalanceService::class,
			'repository' => new BalanceRepository(),
		],
		'userWon' => [
			'class' => UserWonService::class,
			'repository' => new UserWonRepository(),
		],
		'item' => [
			'class' => ItemService::class
		],
		'bonus' => [
			'class' => BonusService::class
		],
		'money' => [
			'class' => MoneyService::class
		],
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@frontend/messages',
					'sourceLanguage' => 'ru-RU',
					'fileMap' => [
						'basic' => 'basic.php',
						'app' => 'app.php',
						'app/error' => 'error.php',
					],
				],
			],
		],
	],
	'params' => $params,
];
