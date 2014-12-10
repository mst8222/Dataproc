<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2005idid".
 *
 * @property string $GL2005ID_HolderID
 * @property string $HD2005ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2005idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2005idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2005ID_HolderID', 'HD2005ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2005ID_HolderID' => 'Gl2005 Id  Holder ID',
            'HD2005ID_HolderID' => 'Hd2005 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
