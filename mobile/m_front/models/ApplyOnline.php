<?php

namespace m_front\models;

use yii\base\Model;

class ApplyOnline extends Model
{
    public $name;
    public $email;
    public $mobile;
    public $interest;
    public $message;

    public function rules()
    {
        return [

            [['name', 'email', 'mobile','interest','message'], 'required'],
            [['name', 'email', 'mobile', 'interest', 'message'], 'string', 'max' => 255],
            [['email'],'email'],
        ];
    }

    
}