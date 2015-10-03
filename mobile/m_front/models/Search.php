<?php

namespace m_front\models;

use yii\base\Model;

class Search extends Model
{
    public $project;
    public $location;
    public $size;
    public $type;

    public function rules()
    {
        return [

            [['project','location','size','type'],'safe']
        ];
    }

    
}