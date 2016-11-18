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
 * Group
 *
 * @property integer $id
 * @property string $type_id
 * @property string $name
 * @property string $description
 * @property integer $status
 *
 * @property GroupHasType[] $groupHasTypes
 * @property Type[] $types
 */
class Group extends ActiveRecord
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
            static::STATUS_ARCHIVED => Yii::t('document/group', 'const.status.archived'),
            static::STATUS_DELETED => Yii::t('document/group', 'const.status.deleted'),
            static::STATUS_ACTIVE => Yii::t('document/group', 'const.status.active'),
        ];
    }

    /**
     * @inheritdoc
     * @return query\GroupActiveQuery the newly created [[ActiveQuery]] instance.
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
            'id' => Yii::t('document/group', 'label.id'),
            'type_id' => Yii::t('document/group', 'label.type_id'),
            'name' => Yii::t('document/group', 'label.name'),
            'description' => Yii::t('document/group', 'label.description'),
            'status' => Yii::t('document/group', 'label.status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('document/group', 'hint.id'),
            'type_id' => Yii::t('document/group', 'hint.type_id'),
            'name' => Yii::t('document/group', 'hint.name'),
            'description' => Yii::t('document/group', 'hint.description'),
            'status' => Yii::t('document/group', 'hint.status'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributePlaceholders()
    {
        return [
            'id' => Yii::t('document/group', 'placeholder.id'),
            'type_id' => Yii::t('document/group', 'placeholder.type_id'),
            'name' => Yii::t('document/group', 'placeholder.name'),
            'description' => Yii::t('document/group', 'placeholder.description'),
            'status' => Yii::t('document/group', 'placeholder.status'),
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
     * Get value from Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value to Description
     *
     * @param $value
     * @return $this
     */
    public function setDescription($value)
    {
        $this->description = $value;
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
     * Get relation GroupHasType[]
     *
     * @param string $class
     * @return query\GroupHasTypeActiveQuery
     */
    public function getGroupHasTypes($class = '\GroupHasType')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['group_id' => 'id']);
    }

    /**
     * Get relation Type[]
     *
     * @param string $class
     * @return query\TypeActiveQuery
     */
    public function getTypes($class = '\Type')
    {
        return $this->hasMany(static::findClass($class, __NAMESPACE__), ['id' => 'group_id'])->via('groupHasTypes');
    }

}
