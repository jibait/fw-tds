<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
Router::start();
Router::addRoute("", "controllers\\IndexController");
\Ubiquity\assets\AssetsManager::start($config);
