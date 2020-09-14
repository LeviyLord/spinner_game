<?php

namespace frontend\strategies;

use yii\base\BaseObject;
use yii2lab\extension\common\helpers\ClassHelper;

/**
 * Class BaseStrategyContext
 *
 * @package yii2lab\extension\scenario\base
 *
 * @property-read Object $strategyInstance
 */
abstract class BaseStrategyContext extends BaseObject {
	
	private $strategyInstance;

	/**
	 * @return Object
	 */
	public function getStrategyInstance() {
		return $this->strategyInstance;
	}

	/**
	 * @param Object $strategyInstance
	 */
	public function setStrategyInstance(Object $strategyInstance) {
		$this->strategyInstance = $strategyInstance;
	}

	/**
	 * @param $strategyDefinition
	 */
	public function setStrategyDefinition($strategyDefinition) {
		$strategyInstance = new $strategyDefinition();
		$this->setStrategyInstance($strategyInstance);
	}
	
}
