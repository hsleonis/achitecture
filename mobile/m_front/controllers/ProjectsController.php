<?php
namespace m_front\controllers;

use Yii;
use yii\helpers\Html;


use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use m_front\models\Product;
use m_front\models\ProductCategory;


class ProjectsController extends Controller
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


    
    public function actionView($slug1='',$slug2=''){
        $title = $slug1;
        if(!empty($slug2)){
            $title .= ' - '.$slug2;
        }

        $data = ProductCategory::getHierarchy_cat_with_slug($slug1);

        return $this->render('project_list',[
                'title' => $title,
                'slug1' => $slug1,
                'slug2' => $slug2,
                'data' => $data
            ]);
    }


    public function actionProjectview($cat1='',$cat2='',$project=''){
        $title = $project;

        $project_data = Product::find()->where(['slug'=>$project])->one();

        return $this->render('project_view',[
                'title' => $title,
                'project_data' => $project_data,
                'cat1' => $cat1
            ]);

    }

}
