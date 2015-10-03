<?php
namespace m_front\controllers;

use Yii;
use yii\helpers\Html;


use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use m_front\models\Slider;
use m_front\models\Page;
use m_front\models\Search;
use m_front\models\Product;
use m_front\models\ProductCategory;


class SiteController extends Controller
{

    public function beforeAction($action){
        
        $this->getView()->theme = Yii::createObject([
            'class' => '\yii\base\Theme',
            'pathMap' => ['@app/views' => '@app/web/themes/'.Yii::$app->params['frontend.theme']],
            'baseUrl' => '@web/themes/'.Yii::$app->params['frontend.theme'],
        ]);

        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }





    public function actionIndex()
    {   
        $data_q = Slider::get_slider_1(3);
        $news_q = Page::find()->where(['page_slug'=>'news'])->one();

        if(!empty($news_q)){
            $news = Page::findChild_pages_by_id($news_q->id);
        }else{
            $news = '';
        }

        return $this->render('index',['data_q'=>$data_q, 'news'=>$news]);
    }


    public function actionSearch(){
        $model = new Search();

        $response = [];
        $finalResponse = [];
        $counter = 0;

        if ($model->load(Yii::$app->request->post())) {
        
            
	    $term_size = explode('-', $model->size);
            if(!empty($model->size)){
            	
            	$data_q = Product::find()
                            ->join( 'INNER JOIN', 
                                    'product_specification as ps',
                                    'ps.product_id = product.id'
                                )
                            ->join( 'INNER JOIN', 
                                    'product_category_rel as pcr',
                                    'pcr.product_id = product.id'
                                )
                            ->join( 'INNER JOIN', 
                                    'product_category as pc',
                                    'pc.id = pcr.category_id'
                                )
                            ->where(['LIKE', 'title', $model->project])
                            ->andWhere(['LIKE', 'item_val', $model->location])
                            ->andWhere(['>=', 'item_val', (int)$term_size[0]])
                            ->andWhere(['<=', 'item_val', (int)$term_size[1]])
                            ->andWhere(['LIKE', 'pc.cat_title', $model->type])
                            ->all();
            }else{
            	$data_q = Product::find()
                            ->join( 'INNER JOIN', 
                                    'product_specification as ps',
                                    'ps.product_id = product.id'
                                )
                            ->join( 'INNER JOIN', 
                                    'product_category_rel as pcr',
                                    'pcr.product_id = product.id'
                                )
                            ->join( 'INNER JOIN', 
                                    'product_category as pc',
                                    'pc.id = pcr.category_id'
                                )
                            ->where(['LIKE', 'title', $model->project])
                            ->andWhere(['LIKE', 'item_val', $model->location])
                            ->andWhere(['LIKE', 'pc.cat_title', $model->type])
                            ->all();
            }
                             

            foreach ($data_q as $key => $value) {
                $response[$value->slug]['id'] = $value->id;
                $response[$value->slug]['title'] = $value->title;
                $response[$value->slug]['slug'] = $value->slug;

                $cat_hierarchy = ProductCategory::getHierarchy_cat_with_product_slug($value->slug);
                $response[$value->slug]['url'] = $cat_hierarchy;

                foreach ($value->specification as $spec) {
                    if($spec->item_name=='Location'){
                        $response[$value->slug]['location'] = $spec->item_val;
                    }
                }
                $counter++; 
            }

            $finalResponse['totalResult'] = $counter;

            $finalResponse['searchedData'] = $response;

            return $this->render('search',['finalResponse'=>$finalResponse]);
        }
        else{
            return $this->render('search');
        }
        
        
    }

}
