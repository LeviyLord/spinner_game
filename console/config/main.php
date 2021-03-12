<?php

use frontend\repositories\UserWonRepository;
use frontend\services\UserWonService;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
			'class' => 'yii\faker\FixtureController',
			'templatePath' => '@tests/unit/fixtures/templates',
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'userWon' => [
			'class' => UserWonService::class,
			'repository' => new UserWonRepository(),
		],
    ],
    'params' => $params,
];
