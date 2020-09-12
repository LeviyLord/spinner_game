<?php

use yii\db\Migration;

/**
 * Class m200912_115324_balance
 */
class m200912_115324_balance extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('{{%balance}}', [
			'id' => $this->primaryKey(),
			'type' => $this->integer()->notNull(),
			'prize' => $this->string()->notNull(),
			'amount' => $this->float()->notNull(),
			'status' => $this->boolean()->defaultValue(true),
		]);

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%balance}}');
	}
}
