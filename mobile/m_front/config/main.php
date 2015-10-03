<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-m_front',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'm_front\controllers',
    'homeUrl' => '/anz/mobile',
    'components' => [
        'request' => [
            'baseUrl' => '/anz/mobile',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.shantaholdings.com',
                'username' => 'webmail@shantaholdings.com',
                'password' => 'Shanta123$',
                'port' => '26',
                'encryption' => 'tls',
            ],
        ],
        /*'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@app/web/themes/in-the-mountains'],
                'baseUrl' => '@web/themes/in-the-mountains',
            ],
        ],*/
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'enableStrictParsing' => false,
            'rules' => array(
                'site/search' => 'site/search',
                '<controller:\w+>/comment' => '<controller>/comment',
                '<controller:\w+>/book_now' => '<controller>/book_now',
                '<controller:\w+>/apply_online' => '<controller>/apply_online',
                '<controller:\w+>/land_contact' => '<controller>/land_contact',
                '<controller:\w+>/buyers_contact' => '<controller>/buyers_contact',
                '<controller:\w+>/send_message' => '<controller>/send_message',

                '<controller:\w+>/<slug1:(\w|\-)+>/<slug2:(\w|\-)+>' => '<controller>/view',
                '<controller:\w+>/<slug1:(\w|\-)+>' => '<controller>/view',
                '<controller:\w+>/<cat1:(\w|\-)+>/<cat2:(\w|\-)+>/<project:(\w|\-)+>' => '<controller>/projectview',

                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
        'urlManagerBackEnd' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => '/anz/cms/backend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
    ],
    'params' => $params,
    'vendorPath' => dirname(__DIR__).'/../../vendor',
];
