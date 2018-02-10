<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/test_db.php';

/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'basic-tests',
    'basePath' => dirname(__DIR__),  
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        'test'   => dirname(__DIR__) . '/tests',
        'SimpleKanban' => dirname(__DIR__) . '/src/SimpleKanban'
    ],  
    'language' => 'en-US',
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module'
        ],
        'kanban' => [
            'class' => 'SimpleKanban\Module\Kanban\Module',
        ]
    ],
    'components' => [
        'db' => $db,
        'mailer' => [
            'useFileTransport' => true,
        ],
        'assetManager' => [            
            'basePath' => __DIR__ . '/../web/assets',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
                'POST api/boards' => 'api/board/open',
                'DELETE api/sessions' => 'api/session/delete',
                
                /*[
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['api/board', 'api/column', 'api/card', 'api/user'],
                ],
                [
                    'class' => 'yii\rest\UrlRule', 
                    'controller' => ['api/session'],
                    'except' => ['delete']
                ]*/
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],        
        'request' => [
            'cookieValidationKey' => 'test',
            'enableCsrfValidation' => false,
            // but if you absolutely need it set cookie domain to localhost
            /*
            'csrfCookie' => [
                'domain' => 'localhost',
            ],
            */
        ],        
    ],
    'params' => $params,
];
