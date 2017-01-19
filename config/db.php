<?php
/**
 * 数据库配置文件。
 * 各参数的含义可以去 yii\db\Connection 的注释里面看，很详细
 *
 * 配置主从：http://stackoverflow.com/questions/30170814/how-to-yii2-master-slave-connections
 */

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=OpenAsk',
    'username' => 'root',
    'password' => '',
    'tablePrefix' => 'openask_',
    'charset' => 'utf8mb4',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 10,
];
