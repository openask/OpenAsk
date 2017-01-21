<?php

$config = [
    'name' => 'OpenAsk',
    'language' => 'zh-CN',
    'sourceLanguage' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'id' => 'app',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => 'APP_ID',
                    'clientSecret' => 'APP_SECRET',
                ],
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'CONSUMER_KEY',
                    'consumerSecret' => 'CONSUMER_SECRET',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'github' => [
                    'class'        => 'dektrium\user\clients\GitHub',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'yandex' => [
                    'class'        => 'dektrium\user\clients\Yandex',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET'
                ],
                'linkedin' => [
                    'class'        => 'dektrium\user\clients\LinkedIn',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET'
                ],
            ],
        ],
        'session' => [
            'class' => 'yii\web\DbSession',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BhGwCRHZ7b8Qr9t19grCs9YGhNP17erb',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning',],
                ],
            ],
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'index/index',

                'people/<slug:.{5,}>' => 'people/view',
                'people/<slug:.{5,}>/<action:[\w-]+>' => 'people/<action>',

                'topic/<topic:.+>' => 'question/index',
                'questions/<filter:.+>' => 'question/index',
                'questions' => 'question/index',
                'ask' => 'question/create',
                'question/<id:[\d]+>' => 'question/view',
                'question/<id:[\d]+>/edit' => 'question/update',
                'question/<question_id:[\d]+>/answer/<answer_id:[\d]+>' => 'question/answer',

                'question/<question_id:[\d]+>/answer/<answer_id:[\d]+>/edit' => 'answer/update',

                '<controller:[\w-]+>' => '<controller>/index',
            ],
        ],
        'view' => [
            /** @see http://www.yiiframework.com/doc-2.0/guide-output-theming.html */
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/sf/views',
                    '@app/widgets/views' => '@app/themes/sf/views/_widgets',
                ],
            ],
        ],
        'assetManager' => [
            'linkAssets' => YII_DEBUG ? true : false,
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
