<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2004idid".
 *
 * @property string $GL2004ID_HolderID
 * @property string $HD2004ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2004idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2004idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2004ID_HolderID', 'HD2004ID_HolderID'], 'string', 'max' => 255],
            [['NValue'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2004ID_HolderID' => 'Gl2004 Id  Holder ID',
            'HD2004ID_HolderID' => 'Hd2004 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
