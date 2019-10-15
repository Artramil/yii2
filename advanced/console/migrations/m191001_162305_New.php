<?php

use yii\db\Migration;

/**
 * Class m191001_162305_New
 */
class m191001_162305_New extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('New', [
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'discriptiont'=>$this->text(),
            'urlImage'=>$this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('New');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191001_162305_New cannot be reverted.\n";

        return false;
    }
    */
}
