<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hd2010".
 *
 * @property string $StockID
 * @property string $S-StockID
 * @property string $Period
 * @property string $HolderID
 * @property string $TOP10Sharehodlers_HolderName
 * @property string $ShareQuantity
 * @property string $ShareNatureID
 * @property string $ShareRate
 * @property string $ShareNature
 * @property string $Rank
 * @property integer $id
 * @property string $NValue
 */
class Hd2010 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hd2010';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StockID', 'S-StockID', 'Period', 'HolderID', 'TOP10Sharehodlers_HolderName', 'ShareQuantity', 'ShareNatureID', 'ShareRate', 'ShareNature', 'Rank', 'NValue'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StockID' => 'Stock ID',
            'S-StockID' => 'S  Stock ID',
            'Period' => 'Period',
            'HolderID' => 'Holder ID',
            'TOP10Sharehodlers_HolderName' => 'Top10 Sharehodlers  Holder Name',
            'ShareQuantity' => 'Share Quantity',
            'ShareNatureID' => 'Share Nature ID',
            'ShareRate' => 'Share Rate',
            'ShareNature' => 'Share Nature',
            'Rank' => 'Rank',
            'id' => 'ID',
            'NValue' => 'Nvalue',
        ];
    }
}
