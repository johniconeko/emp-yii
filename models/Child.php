<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%tbl_child}}".
 *
 * @property int $CHILD_ID
 * @property string $LAST_NAME
 * @property string $FIRST_NAME
 * @property string $MIDDLE_NAME
 * @property string $BIRTH_DATE
 *
 * @property TblFamily[] $tblFamilies
 */
class Child extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_child';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME', 'BIRTH_DATE'], 'required'],
            [['BIRTH_DATE'], 'safe'],
            [['LAST_NAME', 'FIRST_NAME', 'MIDDLE_NAME'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CHILD_ID' => 'Child ID',
            'LAST_NAME' => 'Last Name',
            'FIRST_NAME' => 'First Name',
            'MIDDLE_NAME' => 'Middle Name',
            'BIRTH_DATE' => 'Birth Date',
        ];
    }

    /**
     * Gets query for [[TblFamilies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(Family::className(), ['CHILD_ID' => 'CHILD_ID']);
    }

    public function getFamilyDataProvider(){
        $dataProvider = new ActiveDataProvider([
            'query' => Family::find()->where(['CHILD_ID'=>$this->CHILD_ID]),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'CHILD_ID' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $dataProvider;
    }
}
