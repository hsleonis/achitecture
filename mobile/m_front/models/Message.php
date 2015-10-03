<?php

namespace m_front\models;

use yii\base\Model;

class Message extends Model
{

    public $name;
    public $email;
    public $message;

    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['email'],'email'],
            [['name', 'email'], 'string', 'max' => 255]
        ];
    }

}
