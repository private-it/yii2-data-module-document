<?php
/**
 * Created by ERDConverter
 */

use yii\db\Schema;
use yii\db\Migration;

/**
 * m161013_051442_003_create_document
 *
 */
class m161013_051442_003_create_document extends Migration
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

        $this->createTable(\PrivateIT\modules\document\models\Document::tableName(), [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->defaultValue(0),
            'type_id' => $this->integer()->defaultValue(0),
            'name' => $this->string()->defaultValue(""),
            'size' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(\PrivateIT\modules\document\models\Document::tableName());
    }
}