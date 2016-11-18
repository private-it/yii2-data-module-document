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
 * Document
 *
 * @property integer $id
 * @property integer $owner_id
 * @property integer $type_id
 * @property string $name
 * @property integer $size
 * @property integer $status
 *
 * @property Ref[] $refs
 * @property Signatory[] $signatories
 * @property Type $type
 */
class Document extends ActiveRecord
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
            static::STATUS_ARCHIVED => Yii::t('document/document', 'const.status.archived'),
            static::STATUS_DELETED => Yii::t('document/document', 'const.status.deleted'),
            static::STATUS_ACTIVE => Yii::t('document/document', 'const.status.active'),
        ];
    }

    /**
     * @inheritdoc
     * @return query\DocumentActiveQuery the newly created [[ActiveQuery]] instance.
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
            'id' => Yii::t('document/document', 'label.id'),
            'owner_id' => Yii::t('document/document', 'label.owner_id'),
            'type_id' => Yii::t('document/document', 'label.type_id'),
            'name' => Yii::t('document/document', 'label.name'),
            'size' => Yii::t('document/document', 'label.size'),
            'status' => Yii::t('document/document', 'label.status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('document/document', 'hint.id'),
            'owner_id' => Yii::t('document/document', 'hint.owner_id'),
            'type_id' => Yii::t('document/document', 'hint.type_id'),
            'name' => Yii::t('document/document', 'hint.name'),
            'size' => Yii::t('document/document', 'hint.size'),
            'status' => Yii::t('document/document', 'hint.status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributePlaceholders()
    {
        return [
            'id' => Yii::t('document/document', 'placeholder.id'),
            'owner_id' => Yii::t('document/document', 'placeholder.owner_id'),
            'type_id' => Yii::t('document/document', 'placeholder.type_id'),
            'name' => Yii::t('document/document', 'placeholder.name'),
            'size' => Yii::t('document/document', 'placeholder.size'),
            'status' => Yii::t('document/document', 'placeholder.status'),
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
     * Get value from OwnerId
     *
     * @return string
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * Set value to OwnerId
     *
     * @param $value
     * @return $this
     */
    public function setOwnerId($value)
    {
        $this->owner_id = $value;
        return $this;
    }

    /**
     * Get value from TypeId
     *
     * @return string
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set value to TypeId
     *
     * @param $value
     * @return $this
     */
    public function setTypeId($value)
    {
        $this->type_id = $value;
        return $this;
    }

    /**
     * Get value from Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value to Name
     *
     * @param $value
     * @return $this
     */
    public function setName($value)
    {
        $this->name = $value;
        return $this;
    }

    /**
     * Get value from Size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set value to Size
     *
     * @param $value
     * @return $this
     */
    public function setSize($value)
    {
        $this->size = $value;
        return $this;
    }

    /**
     * Get value from Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set value to Status
     *
     * @param $value
     * @return $this
     */
    public function setStatus($value)
    {
        $this->status = $value;
        return $this;
    }

    /**
     * Get relation Ref[]
     *
     * @param string $class
     * @return query\RefActiveQuery
     */
    public function getRefs($class = '\Ref')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['document_id' => 'id']);
    }

    /**
     * Get relation Signatory[]
     *
     * @param string $class
     * @return query\SignatoryActiveQuery
     */
    public function getSignatories($class = '\Signatory')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['document_id' => 'id']);
    }

    /**
     * Get relation Type
     *
     * @param string $class
     * @return query\TypeActiveQuery
     */
    public function getType($class = '\Type')
    {
        return $this->hasOne(static::findClass($class, __NAMESPACE__), ['id' => 'type_id']);
    }

}
