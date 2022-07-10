<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_region}}".
 *
 * @property string $region_c
 * @property string $region_m
 * @property string $abbreviation
 * @property int|null $region_sort
 *
 * @property TblOffice[] $tblOffices
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_c', 'region_m', 'abbreviation'], 'required'],
            [['region_sort'], 'integer'],
            [['region_c'], 'string', 'max' => 2],
            [['region_m', 'abbreviation'], 'string', 'max' => 200],
            [['region_c'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'region_c' => 'Region Code',
            'region_m' => 'Region Name',
            'abbreviation' => 'Abbreviation',
            'region_sort' => 'Region Sort',
        ];
    }

    /**
     * Gets query for [[TblOffices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffices()
    {
        return $this->hasMany(Office::className(), ['OFFICE_LOCATION' => 'region_c']);
    }
}
