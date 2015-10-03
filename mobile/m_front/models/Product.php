<?php

namespace m_front\models;

use Yii;
use m_front\models\ProductImageRel;
use m_front\models\ProductSpecification;
use m_front\models\ProductFiles;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'required'],
            [['desc'], 'string'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getPost()
    {
        return $this->hasMany(ProductPost::className(), ['product_id' => 'id'])->orderBy('product_post.sort_order asc');
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['product_id' => 'id'])->andWhere(['is_approved'=>'1']);
    }

    public function getImage_by_banner()
    {
        return $this->hasOne(ProductImageRel::className(), ['product_id' => 'id'])->andWhere(['is_banner'=>'1'])->orderBy('sort_order asc');
    }

    public function getImage_by_gallery()
    {
        return $this->hasOne(ProductImageRel::className(), ['product_id' => 'id'])->andWhere(['is_gallery'=>'1'])->orderBy('sort_order asc');
    }

    public function getImage_all()
    {
        return $this->hasMany(ProductImageRel::className(), ['product_id' => 'id'])->orderBy('sort_order asc');
    }

    public function getImage_by_banner_all()
    {
        return $this->hasMany(ProductImageRel::className(), ['product_id' => 'id'])->andWhere(['is_banner'=>'1'])->orderBy('sort_order asc');
    }

    public function getImage_by_gallery_all()
    {
        return $this->hasMany(ProductImageRel::className(), ['product_id' => 'id'])->andWhere(['is_gallery'=>'1'])->orderBy('sort_order asc');
    }

    public function getImage_by_hover_all()
    {
        return $this->hasMany(ProductImageRel::className(), ['product_id' => 'id'])->andWhere(['is_hover'=>'1'])->orderBy('sort_order asc');
    }

    public function getFiles_all()
    {
        return $this->hasMany(ProductFiles::className(), ['product_id' => 'id']);
    }

    


    public function getSpecification()
    {
        return $this->hasMany(ProductSpecification::className(), ['product_id' => 'id']);
    }



    public static function getProduct_by_slug($slug){
        $options = [];

        $product = self::find()->where(['slug'=>$slug])->one();

        $options['data'] = $product;
        $options['images_banner'] = $product->image_by_banner_all;
        $options['images_gallery'] = $product->image_by_gallery_all;
        $options['images_hover'] = $product->image_by_hover_all;
        $options['files'] = $product->files_all;
        $options['comments'] = $product->comments;
        //$options['specification'] = $product->specification;
        foreach ($product->specification as $spec) {
            $options['specification'][$spec['item_name']] = $spec;
        }

        foreach ($product->post as $key => $value) {
            $options['posts'][$value->slug] = $value;
        }
        

        return $options;
    }


    public static function getProduct_title_list(){
        $options = array();

        $product = self::find()->all();

        foreach ($product as $key => $value) {
            //$options[$value->title] = $value->title;
            array_push($options, $value->title);
        }
        

        return $options;
    }

    public static function getProduct_location_list(){
        $options = array();

        $product = self::find()->all();

        foreach ($product as $p) {
            foreach ($p->specification as $key => $value) {

                if($value->item_name=='Location'){
                    array_push($options, $value->item_val);
                }
                
            }
        }
        
        return $options;
    }


}
