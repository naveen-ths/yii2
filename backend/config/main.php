<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityCookie' => [
                'name' => '_backendIdentity',
                'path' => '/admin',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            'name' => 'BACKENDSESSID',
            'cookieParams' => [
                'httpOnly' => true,
                'path' => '/admin',
            ],
        ],
//        'user' => [
//            'identityClass' => 'common\models\User',
//            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
//        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
//                   '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//                ],
//            ],
//        ],
//        'assetManager' => [
//            'bundles' => [
//                'dmstr\web\AdminLteAsset' => [
//                    'skin' => 'skin-black',
//                ],
//            ],
//        ],
    ],
    'params' => $params,
//    'modules' => [
////        'user' => [
////            // following line will restrict access to profile, recovery, registration and settings controllers from backend
////            'as backend' => 'dektrium\user\filters\BackendFilter',
////        ],
//        'user' => [
//            'class' => 'dektrium\user\Module', 'controllerMap' => ['registration' => ['class' => '\dektrium\user\controllers\RegistrationController', 'on ' . \dektrium\user\controllers\RegistrationController::EVENT_BEFORE_CONFIRM => function($event) {
//                        \Yii::$app->session->set('test before confirm', $event->getId());
//                    }],],],
//    ],
];
