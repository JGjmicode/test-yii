<?php
namespace app\models;

use yii\db\ActiveRecord;

class UsersSkills extends ActiveRecord{

    public static function tableName()
    {
        return 'Users_skills';
    }

}