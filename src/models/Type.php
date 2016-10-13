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
 * Type
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 *
 * @property Document[] $documents
 * @property GroupHasType[] $groupHasTypes
 * @property Group[] $groups
 */
class Type extends ActiveRecord
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
            static::STATUS_ARCHIVED => Yii::t('document/type', 'const.status.archived'),
            static::STATUS_DELETED => Yii::t('document/type', 'const.status.deleted'),
            static::STATUS_ACTIVE => Yii::t('document/type', 'const.status.active'),
        ];
    }

    /**
     * @inheritdoc
     * @return query\TypeActiveQuery the newly created [[ActiveQuery]] instance.
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
            'id' => Yii::t('document/type', 'label.id'),
            'name' => Yii::t('document/type', 'label.name'),
            'status' => Yii::t('document/type', 'label.status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('document/type', 'hint.id'),
            'name' => Yii::t('document/type', 'hint.name'),
            'status' => Yii::t('document/type', 'hint.status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributePlaceholders()
    {
        return [
            'id' => Yii::t('document/type', 'placeholder.id'),
            'name' => Yii::t('document/type', 'placeholder.name'),
            'status' => Yii::t('document/type', 'placeholder.status'),
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
     * Get relation Document[]
     *
     * @param string $class
     * @return query\DocumentActiveQuery
     */
    public function getDocuments($class = '\Document')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['type_id' => 'id']);
    }

    /**
     * Get relation GroupHasType[]
     *
     * @param string $class
     * @return query\GroupHasTypeActiveQuery
     */
    public function getGroupHasTypes($class = '\GroupHasType')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['type_id' => 'id']);
    }

    /**
     * Get relation Group[]
     *
     * @param string $class
     * @return query\GroupActiveQuery
     */
    public function getGroups($class = '\Group')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['id' => 'type_id'])->via('groupHasTypes');
    }

}
