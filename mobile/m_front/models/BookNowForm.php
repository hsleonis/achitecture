<?php

namespace m_front\models;

use yii\base\Model;

class BookNowForm extends Model
{
    public $name;
    public $home_address;
    public $contact_cell_number;
    public $contact_tnt_number;
    public $email_id;
    public $call_time;
    public $project_name;

    public function rules()
    {
        return [

            [['name', 'email_id', 'project_name'], 'required'],
            [['name', 'home_address', 'contact_cell_number', 'contact_tnt_number', 'email_id', 'call_time'], 'string', 'max' => 255],
            [['email_id'],'email'],
        ];
    }

}