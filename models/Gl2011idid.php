<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gl2011idid".
 *
 * @property string $GL2011ID_HolderID
 * @property string $HD2011ID_HolderID
 * @property integer $id
 * @property string $NValue
 */
class Gl2011idid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gl2011idid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GL2011ID_HolderID', 'HD2011ID_HolderID', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GL2011ID_HolderID' => 'Gl2011 Id  Holder ID',
            'HD2011ID_HolderID' => 'Hd2011 Id  Holder ID',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
