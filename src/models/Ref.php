<?php
/**
 * Created by ERDConverter
 */
namespace PrivateIT\modules\document\models;

use PrivateIT\modules\document\DocumentModule;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Ref
 *
 * @property integer $id
 * @property integer $document_id
 * @property integer $object_id
 * @property integer $object_type
 *
 * @property Document $document
 */
class Ref extends ActiveRecord
{
    const STATUS_ARCHIVED = -1;
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * Get object statuses
     *
     * @return array
     */
    static function getStatuses()
    {
        return [
            static::STATUS_ARCHIVED => Yii::t('document/ref', 'const.status.archived'),
            static::STATUS_DELETED => Yii::t('document/ref', 'const.status.deleted'),
            static::STATUS_ACTIVE => Yii::t('document/ref', 'const.status.active'),
        ];
    }

    /**
     * @inheritdoc
     * @return query\RefActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function find()
    {
        return parent::find();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return DocumentModule::tableName(__CLASS__);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('document/ref', 'label.id'),
            'document_id' => Yii::t('document/ref', 'label.document_id'),
            'object_id' => Yii::t('document/ref', 'label.object_id'),
            'object_type' => Yii::t('document/ref', 'label.object_type'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('document/ref', 'hint.id'),
            'document_id' => Yii::t('document/ref', 'hint.document_id'),
            'object_id' => Yii::t('document/ref', 'hint.object_id'),
            'object_type' => Yii::t('document/ref', 'hint.object_type'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributePlaceholders()
    {
        return [
            'id' => Yii::t('document/ref', 'placeholder.id'),
            'document_id' => Yii::t('document/ref', 'placeholder.document_id'),
            'object_id' => Yii::t('document/ref', 'placeholder.object_id'),
            'object_type' => Yii::t('document/ref', 'placeholder.object_type'),
        ];
    }

    /**
     * Get value from Id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value to Id
     *
     * @param $value
     * @return $this
     */
    public function setId($value)
    {
        $this->id = $value;
        return $this;
    }

    /**
     * Get value from DocumentId
     *
     * @return string
     */
    public function getDocumentId()
    {
        return $this->document_id;
    }

    /**
     * Set value to DocumentId
     *
     * @param $value
     * @return $this
     */
    public function setDocumentId($value)
    {
        $this->document_id = $value;
        return $this;
    }

    /**
     * Get value from ObjectId
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Set value to ObjectId
     *
     * @param $value
     * @return $this
     */
    public function setObjectId($value)
    {
        $this->object_id = $value;
        return $this;
    }

    /**
     * Get value from ObjectType
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->object_type;
    }

    /**
     * Set value to ObjectType
     *
     * @param $value
     * @return $this
     */
    public function setObjectType($value)
    {
        $this->object_type = $value;
        return $this;
    }

    /**
     * Get relation Document
     *
     * @param string $class
     * @return query\DocumentActiveQuery
     */
    public function getDocument($class = '\Document')
    {
        return $this->hasOne(static::findClass($class, __NAMESPACE__), ['id' => 'document_id']);
    }

}
