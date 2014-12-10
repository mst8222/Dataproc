<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2007idid".
 *
 * @property string $GL2007ID_HolderID
 * @property string $HD2007ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2007idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2007idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2007ID_HolderID', 'HD2007ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2007ID_HolderID' => 'Gl2007 Id  Holder ID',
            'HD2007ID_HolderID' => 'Hd2007 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
