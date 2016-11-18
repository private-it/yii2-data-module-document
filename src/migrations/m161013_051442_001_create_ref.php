<?php
/**
 * Created by ERDConverter
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * m161013_051442_001_create_ref
 *
 */
class m161013_051442_001_create_ref extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(\PrivateIT\modules\document\models\Ref::tableName(), [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer()->defaultValue(0),
            'object_id' => $this->integer()->defaultValue(0),
            'object_type' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(\PrivateIT\modules\document\models\Ref::tableName());
    }
}