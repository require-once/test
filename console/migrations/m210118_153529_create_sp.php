<?php

use yii\db\Migration;

/**
 * Class m210118_153529_create_sp
 */
class m210118_153529_create_sp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = 'CREATE PROCEDURE sp_SaveData(OUT res INT, IN quantity INT, IN email VARCHAR(255), IN fio VARCHAR(255))
        BEGIN
            INSERT INTO test(id, quantity, email, fio) VALUES(null, quantity, email, fio);
            IF quantity % 2 THEN
                SELECT 1 into res;
            ELSE
                SELECT 0 into res;
            END IF;
        END';

        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $sql = 'DROP PROCEDURE sp_SaveData';
        Yii::$app->db->createCommand($sql)->execute();
    }
}
