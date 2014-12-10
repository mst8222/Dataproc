<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2008idid".
 *
 * @property string $GL2008ID_HolderID
 * @property string $HD2008ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2008idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2008idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2008ID_HolderID', 'HD2008ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2008ID_HolderID' => 'Gl2008 Id  Holder ID',
            'HD2008ID_HolderID' => 'Hd2008 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
