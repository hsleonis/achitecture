<?php

namespace m_front\models;

use yii\base\Model;

class Buyers extends Model
{
    public $preferred_location;
    public $preferred_size;
    public $car_parking_req;
    public $expected_handover_time;
    public $facing_apartment;
    public $preferred_floor;
    public $loan_req;
    public $min_bed_rooms;
    public $min_bathroom_req;
    public $maid_accomodation;

    public $name;
    public $profession;
    public $designation;
    public $mobile_number;
    public $email;
    public $mailing_address;

    public function rules()
    {
        return [

            [['name', 'profession', 'email'], 'required'],
            [['preferred_location', 'preferred_size', 'car_parking_req', 'expected_handover_time', 'facing_apartment', 'preferred_floor', 'loan_req', 'min_bed_rooms', 'min_bathroom_req', 'maid_accomodation', 'name', 'profession', 'designation', 'mobile_number', 'email', 'mailing_address'], 'string', 'max' => 255],
            [['email'],'email'],
        ];
    }

    
}