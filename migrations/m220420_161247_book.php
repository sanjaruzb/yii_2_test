<?php

use yii\db\Migration;

/**
 * Class m220420_161247_book
 */
class m220420_161247_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220420_161247_book cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220420_161247_book cannot be reverted.\n";

        return false;
    }
    */
}
