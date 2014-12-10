<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2010idid".
 *
 * @property string $GL2010ID_HolderID
 * @property string $HD2010ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2010idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2010idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2010ID_HolderID', 'HD2010ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2010ID_HolderID' => 'Gl2010 Id  Holder ID',
            'HD2010ID_HolderID' => 'Hd2010 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
