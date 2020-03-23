<?php
namespace app\models;
use yii\db\ActiveRecord;

class Names extends ActiveRecord{

    public static function tableName()
    {
        return 'Names';
    }

}
