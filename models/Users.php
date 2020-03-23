<?php
namespace app\models;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{

    public static function tableName(){
        return 'Users';
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getSkills(){
        return $this->hasMany(Skills::className(), ['id' => 'skill_id'])
            ->viaTable('Users_skills', ['user_id' => 'id']);
    }

    public function addUser(){
        $city = City::find()->orderBy('RAND()')->one();
        $name = Names::find()->orderBy('RAND()')->one();
        $this->name = $name->name;
        $this->city_id = $city->id;
        if($this->save(false)){
            $skills = Skills::find()->orderBy('RAND()')->limit(rand(0,5))->all();
            foreach ($skills as $skill){
                $model = new UsersSkills();
                $model->user_id = $this->id;
                $model->skill_id = $skill->id;
                $model->save(false);
            }
        }
    }
}