<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2012idid".
 *
 * @property string $GL2012ID_HolderID
 * @property string $HD2012ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2012idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2012idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2012ID_HolderID', 'HD2012ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2012ID_HolderID' => 'Gl2012 Id  Holder ID',
            'HD2012ID_HolderID' => 'Hd2012 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
