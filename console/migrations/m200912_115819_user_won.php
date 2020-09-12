<?php

use yii\db\Migration;

/**
 * Class m200912_115819_users_won
 */
class m200912_115819_user_won extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('{{%user_won}}', [
			'id' => $this->primaryKey(),
			'user_id' => $this->integer()->notNull(),
			'prize_id' => $this->integer()->notNull(),
			'status' => $this->integer()->notNull(),
			'create_at' => $this->timestamp()->defaultExpression('NOW()'),
			'update_at' => $this->timestamp()
		]);

		$this->addForeignKey('user_user_won_key', 'user_won', 'user_id', 'user', 'id');
		$this->addForeignKey('balance_user_won_key', 'user_won', 'prize_id', 'balance', 'id');

	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('{{%user_won}}');
	}
}
