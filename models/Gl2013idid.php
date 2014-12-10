<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2013idid".
 *
 * @property string $GL2013ID_HolderID
 * @property string $HD2013ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2013idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2013idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2013ID_HolderID', 'HD2013ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2013ID_HolderID' => 'Gl2013 Id  Holder ID',
            'HD2013ID_HolderID' => 'Hd2013 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
