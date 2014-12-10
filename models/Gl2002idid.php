<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2002idid".
 *
 * @property string $GL2002ID_HolderID
 * @property string $HD2002ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2002idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2002idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2002ID_HolderID', 'HD2002ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2002ID_HolderID' => 'Gl2002 Id  Holder ID',
            'HD2002ID_HolderID' => 'Hd2002 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
