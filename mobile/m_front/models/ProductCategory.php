<?php

namespace m_front\models;

use Yii;
use m_front\models\Product;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property string $cat_title
 * @property string $cat_desc
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_title', 'cat_desc', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['cat_desc'], 'string'],
            [['created_at', 'updated_at', 'sort_order'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['cat_title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_title' => 'Cat Title',
            'cat_desc' => 'Cat Desc',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'sort_order' => 'Sort Order'
        ];
    }

    public static function getProducts($id)
    {
        $data = ProductCategoryRel::find()->where(['category_id'=>$id])->orderBy('sort_order','DESC')->all();
        return $data;
    }


    public function findCategory_by_name($name){
        $category = ProductCategory::find()->where(['cat_title'=>$name])->one();
        return $category;
    }

    public function findCategory_by_id($id){
        $category = ProductCategory::find()->where(['id'=>$id])->one();
        return $category;
    }

    public function findAllCategory(){
        $category = ProductCategory::find()->all();
        return $category;
    }


    public function getcat_rel()
    {
        return $this->hasMany(ProductCategorySelfRel::className(), ['cat_id' => 'id']);
    }



    public static function get_child_cat($parent, $options){
        $datas = [];
        
        $child_pages = self::find()->joinWith('cat_rel')->where(['product_category_self_rel.parent_cat_id'=>$parent])->all();

        if(!empty($child_pages)){
            
            foreach ($child_pages as $key => $value) {
                $options[$value->cat_slug]['data'] = $value;

                $products_array = self::getProducts($value->id);
                $options[$value->cat_slug]['products'] = $products_array;
                

                $options[$value->cat_slug]['child_cat']=self::get_child_cat($value->id, $datas);
                $datas = [];
            }
        }

        return $options;
    }

    public static function getHierarchy_cat_with_slug($slug) {
        $options = [];
        $datas = [];

        $parent_pages = self::find()->joinWith('cat_rel')->where(['product_category.cat_slug'=>$slug])->all();
        
        if(!empty($parent_pages)){
            foreach ($parent_pages as $key => $value) {
                $options['data'] = $value;

                $products_array = self::getProducts($value->id);
                $options['products'] = $products_array;
                

                $options['child_cat'] = self::get_child_cat($value->id, $datas);
            }
        }
        
        return $options;
    }




    public static function get_parent_cat($id,$data){
        $parent = ProductCategorySelfRel::find()->where(['cat_id'=>$id])->one();
        
        if (!empty($parent)) {
            $parent_cat = self::find()->where(['id'=>$parent->parent_cat_id])->one();

            if(!empty($parent_cat)){
                $data = $parent_cat->cat_slug.'/'.$data;

                self::get_parent_cat( $parent->parent_cat_id, $data );
            }
            
        }
        

        return $data;
    }

    public static function getHierarchy_cat_with_product_slug($slug){
        $options = [];
        $data = '';

        $data_q = self::find()
                            ->join( 'INNER JOIN', 
                                    'product_category_rel as pcr',
                                    'pcr.category_id = product_category.id'
                                )
                            ->join( 'INNER JOIN', 
                                    'product as p',
                                    'p.id = pcr.product_id'
                                )
                            ->where(['=', 'p.slug', $slug])
                            ->one();

        $data .= $data_q->cat_slug;

        $final_data = self::get_parent_cat( $data_q->id, $data );
        $final_data .= '/'.$slug;

        return $final_data;
    }
}
