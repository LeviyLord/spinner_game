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
			'title' => $this->string()->notNull(),
			'amount' => $this->integer()->notNull(),
			'is_enabled' => $this->boolean()->defaultValue(true),
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
