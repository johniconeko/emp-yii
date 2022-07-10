<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_employee}}".
 *
 * @property int $EMP_ID
 * @property string $LAST_NAME
 * @property string $FIRST_NAME
 * @property string $MIDDLE_NAME
 * @property string $BIRTH_DATE
 * @property int $OFFICE_ID
 *
 * @property TblOffice $oFFICE
 * @property TblFamily[] $tblFamilies
 * @property TblUser $tblUser
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME', 'BIRTH_DATE', 'OFFICE_ID'], 'required'],
            [['BIRTH_DATE'], 'safe'],
            [['OFFICE_ID'], 'integer'],
            [['LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME'], 'string', 'max' => 255],
            [['OFFICE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Office::className(), 'targetAttribute' => ['OFFICE_ID' => 'OFFICE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EMP_ID' => 'Employee ID',
            'LAST_NAME' => 'Last Name',
            'FIRST_NAME' => 'First Name',
            'MIDDLE_NAME' => 'Middle Name',
            'BIRTH_DATE' => 'Birth Date',
            'OFFICE_ID' => 'Office ID',
        ];
    }

    /**
     * Gets query for [[OFFICE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOFFICE()
    {
        return $this->hasOne(Office::className(), ['OFFICE_ID' => 'OFFICE_ID']);
    }

    /**
     * Gets query for [[TblFamilies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilies()
    {
        return $this->hasMany(Family::className(), ['PARENT_ID' => 'EMP_ID']);
    }

    /**
     * Gets query for [[TblUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['USER_ID' => 'EMP_ID']);
    }
}
