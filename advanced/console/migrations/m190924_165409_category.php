<?php

use yii\db\Migration;

/**
 * Class m190924_165409_category
 */
class m190924_165409_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->createTable('category', [
        'id'=>$this->primaryKey(),
        'name'=>$this->string()->notNull(),
        'descriptioin'=>$this->text(),
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190924_165409_category cannot be reverted.\n";

        return false;
    }
    */
}
