<?php

/* @var $this yii\web\View */
use nullref\datatable\DataTable;
use yii\web\JsExpression;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Тестовое задание Yii2';
?>
<div class="site-index">
    <?php Pjax::begin(['enablePushState' => false]); ?>
    <?= Html::a('Добавить пользователя', Url::to(['/site/add']), ['class' => 'btn-primary btn', 'data-method' => 'POST', 'data-pjax' => '1']) ?>​
    <?= \nullref\datatable\DataTable::widget([
        'data' => $users,
        'order' => [[0, 'desc' ]],
        'columns' => [
            'id',
            [
                'data' => 'name',
                'title' => 'Имя',

            ],
            [
                'data' => 'city.name',
                'title' => 'Место жительства',
            ],
            [
                'data' => 'skills',
                'title' => 'Навыки',
                'render' => new JsExpression('function render(data, type, row, meta ){
                if(data.length > 0){
                    let skills = [];
                    $.each(data, function(index, value){
                        skills.push(value.name)
                    });
                    return "Навыки(" + skills.join(", ") + ")";
                }
                return "";                    
                }'),
            ],
            [
                'data' => 'id',
                'class' => 'nullref\datatable\LinkColumn',
                'url' => ['/site/delete'],
                'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post', 'data-pjax' => '1'],
                'label' => 'Delete',
            ],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
