<?php

use yii\db\Migration;

/**
 * Class mXXXXXXXXXXXX_remove_content_from_posts
 */
class m231209_082250_remove_content_from_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('posts', 'ADDCOLUMNS');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('posts', 'ADDCOLUMNS', $this->text());
    }
}
