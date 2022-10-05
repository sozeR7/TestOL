<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%country}}`.
 */
class m221005_074203_add_time_column_to_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%country}}', 'time', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%country}}', 'time');
    }
}
