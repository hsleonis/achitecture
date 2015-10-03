<?php

namespace m_front\models;

use yii\base\Model;

class LandContact extends Model
{
    public $locality;
    public $address_details;
    public $size_area_plot;
    public $dimension_length;
    public $dimension_breath;
    public $road_width;
    public $land_category;
    public $land_type;
    public $faceing;
    public $other_attractive;
    public $landowner_name;
    public $contact_person;
    public $contact_address;
    public $email;
    public $telephone;
    public $cell_phone;

    public function rules()
    {
        return [

            [['address_details', 'road_width', 'landowner_name', 'contact_address', 'email', 'cell_phone'], 'required'],
            [['locality', 'address_details', 'size_area_plot', 'dimension_length', 'dimension_breath', 'road_width', 'land_category', 'land_type', 'faceing', 'other_attractive', 'landowner_name', 'contact_person', 'contact_address', 'email', 'telephone', 'cell_phone'], 'string', 'max' => 255],
            [['email'],'email'],
        ];
    }

    
}