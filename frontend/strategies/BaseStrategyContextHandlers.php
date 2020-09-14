<?php

namespace frontend\strategies;

use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\domain\helpers\ErrorCollection;

/**
 * Class BaseStrategyContext
 *
 * @package yii2lab\extension\scenario\base
 *
 * @property-read Object  $strategyInstance
 * @property-read array   $strategyDefinitions
 * @property-write string $strategyName
 */
abstract class BaseStrategyContextHandlers extends BaseStrategyContext {
	
	private $strategyDefinitions = [];

	/**
	 * @return array
	 */
	public function getStrategyDefinitions() {
		return $this->strategyDefinitions;
	}

	/**
	 * @param array $handlers
	 */
	public function setStrategyDefinitions(array $handlers) {
		$this->strategyDefinitions = $handlers;
	}

	/**
	 * @param string $strategyName
	 * @throws \Exception
	 */
	public function setStrategyName(string $strategyName) {
		$this->validate($strategyName);
		$strategyDefinition = ArrayHelper::getValue($this->getStrategyDefinitions(), $strategyName);
		$this->setStrategyDefinition($strategyDefinition);
	}

	/**
	 * @param $name
	 */
	protected function validate($name) {
		$strategyHandlers = $this->getStrategyDefinitions();
		if(empty($strategyHandlers)) {
			throw new InvalidArgumentException('Strategy handlers not defined!');
		}
		if(!isset($strategyHandlers[$name])) {
			$errors = new ErrorCollection();
			$errors->add('Handler','Handler ' . $name . ' not found!');
			throw new UnprocessableEntityHttpException($errors);
		}
	}
	
}
