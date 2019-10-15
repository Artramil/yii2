<?php

use yii\db\Migration;

/**
 * Class m191001_161259_Discaunt
 */
class m191001_161259_Discaunt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Discaunt', [
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'discount'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Discaunt');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_161259_Discaunt cannot be reverted.\n";

        return false;
    }
    */
}
