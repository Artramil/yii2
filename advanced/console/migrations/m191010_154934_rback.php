<?php

use yii\db\Migration;

/**
 * Class m191010_154934_rback
 */
class m191010_154934_rback extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->runAction('migrate/up',[
            'migrationPath'=>'@yii/rbac/migrations',
            'interactive'=>true,
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191010_154934_rback cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191010_154934_rback cannot be reverted.\n";

        return false;
    }
    */
}
