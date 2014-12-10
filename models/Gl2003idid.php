<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2003idid".
 *
 * @property string $GL2003ID_HolderID
 * @property string $HD2003ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2003idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2003idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2003ID_HolderID', 'HD2003ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2003ID_HolderID' => 'Gl2003 Id  Holder ID',
            'HD2003ID_HolderID' => 'Hd2003 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
