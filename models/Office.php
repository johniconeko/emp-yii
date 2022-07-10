<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_office}}".
 *
 * @property int $OFFICE_ID
 * @property string $OFFICE_NAME
 * @property string $OFFICE_LOCATION
 *
 * @property TblRegion $oFFICELOCATION
 * @property TblEmployee[] $tblEmployees
 */
class Office extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['OFFICE_NAME', 'OFFICE_LOCATION'], 'required'],
            [['OFFICE_NAME'], 'string', 'max' => 255],
            [['OFFICE_LOCATION'], 'string', 'max' => 2],
            [['OFFICE_LOCATION'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['OFFICE_LOCATION' => 'region_c']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'OFFICE_ID' => 'Office ID',
            'OFFICE_NAME' => 'Office Name',
            'OFFICE_LOCATION' => 'Region Code',
        ];
    }

    /**
     * Gets query for [[OFFICELOCATION]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['region_c' => 'OFFICE_LOCATION']);
    }

    /**
     * Gets query for [[TblEmployees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['OFFICE_ID' => 'OFFICE_ID']);
    }


}
