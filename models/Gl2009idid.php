<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2009idid".
 *
 * @property string $GL2009ID_HolderID
 * @property string $HD2009ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2009idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2009idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2009ID_HolderID', 'HD2009ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2009ID_HolderID' => 'Gl2009 Id  Holder ID',
            'HD2009ID_HolderID' => 'Hd2009 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
