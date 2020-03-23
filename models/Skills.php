<?php
namespace app\models;
use yii\db\ActiveRecord;

class Skills extends ActiveRecord{

    public static function tableName()
    {
        return 'Skills';
    }

}