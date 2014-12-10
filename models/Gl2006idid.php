<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2006idid".
 *
 * @property string $GL2006ID_HolderID
 * @property string $HD2006ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2006idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2006idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2006ID_HolderID', 'HD2006ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2006ID_HolderID' => 'Gl2006 Id  Holder ID',
            'HD2006ID_HolderID' => 'Hd2006 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
