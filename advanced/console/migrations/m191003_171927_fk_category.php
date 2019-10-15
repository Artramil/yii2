<?php

use yii\db\Migration;

/**
 * Class m191003_171927_fk_category
 */
class m191003_171927_fk_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_category',
            'products',
            'idCategori',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191003_171927_fk_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191003_171927_fk_category cannot be reverted.\n";

        return false;
    }
    */
}
