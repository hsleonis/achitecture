<?php
namespace m_front\controllers;

use Yii;
use yii\helpers\Html;


use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile; 
use yii\helpers\Url;


use m_front\models\Page;
use m_front\models\Comments;
use m_front\models\BookNowForm;
use m_front\models\ApplyOnline;
use m_front\models\LandContact;
use m_front\models\Buyers;
use m_front\models\Message;


class PageController extends Controller
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

        $data = Page::find()->where(['page_slug'=>$slug2,'is_archive'=>0])->one();
        $parent_title_q = Page::find()->where(['page_slug'=>$slug1,'is_archive'=>0])->one();
        $child_pages = Page::findChild_pages_by_id($parent_title_q->id);

        $model = new ApplyOnline();

        if ($model->load(Yii::$app->request->post())) {

            $valid = $model->validate();

            if($valid){

                $subject="TH: Contact message";
                $message_text="Name: ".$model->name."<br/>"."Email: ".$model->email."<br/>".
                "Mobile: ".$model->mobile."<br/>"."Interest: ".$model->interest."<br/>"."Message: ".
                $model->message;


                $message = Yii::$app->mailer->compose();

                $message->setFrom($model->email);
                $message->setTo('shimul@dcastalia.com');

                $message->setSubject($subject);
                $message->setHtmlBody($message_text);
                

                if($message->send()){
                    \Yii::$app->getSession()->setFlash('success', 'Thank you for your interests in Tropical homes.');
                    return $this->redirect(Yii::$app->request->referrer);
                }

            }
        }


        if($slug2=='' && $slug1!='buyers'){
            return $this->render('page_view_full',[
                'title' => $title,
                'data' => $data,
                'parent_title_q' => $parent_title_q,
                'child_pages' => $child_pages,
                'slug1' => $slug1,
                'slug2' => $slug2,
                'model' => $model
            ]);
        }else{

            return $this->render('page_view',[
                    'title' => $title,
                    'data' => $data,
                    'parent_title_q' => $parent_title_q,
                    'child_pages' => $child_pages,
                    'slug1' => $slug1,
                    'slug2' => $slug2,
                    'model' => $model
                ]);
 
        }
        
    }

}
