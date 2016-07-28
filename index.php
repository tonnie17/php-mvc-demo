<?php
require_once __DIR__ . '/common/ioc.php';
require_once __DIR__ . '/autoload.php';

$config  = get_config();
$db_path = $config['db']['path'];

IOC::N('JsonDataSource', [$db_path]);
IOC::N('UserDataProvider', ['JsonDataSource']);
IOC::N('UserDataMapper', ['JsonDataSource']);
IOC::N('UserLogic', ['UserDataProvider', 'UserDataMapper']);
IOC::N('UserController', ['UserLogic']);

$app = new Application($config);
$app->dispatch();
