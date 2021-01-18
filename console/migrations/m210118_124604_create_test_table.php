<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m210118_124604_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'quantity' => $this->smallInteger()->unsigned()->notNull(),
            'email' => $this->string(255)->notNull(),
            'fio' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test}}');
    }
}
