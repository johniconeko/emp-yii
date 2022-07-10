<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_family}}".
 *
 * @property int $PARENT_ID
 * @property int $CHILD_ID
 *
 * @property TblChild $cHILD
 * @property TblEmployee $pARENT
 */
class Family extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_family';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PARENT_ID', 'CHILD_ID'], 'required'],
            [['PARENT_ID', 'CHILD_ID'], 'integer'],
            [['CHILD_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Child::className(), 'targetAttribute' => ['CHILD_ID' => 'CHILD_ID']],
            [['PARENT_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['PARENT_ID' => 'EMP_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PARENT_ID' => 'Parent ID',
            'CHILD_ID' => 'Child ID',
        ];
    }

    /**
     * Gets query for [[CHILD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChild()
    {
        return $this->hasOne(Child::className(), ['CHILD_ID' => 'CHILD_ID']);
    }

    /**
     * Gets query for [[PARENT]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Employee::className(), ['EMP_ID' => 'PARENT_ID']);
    }
}
