<?php

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
try {

    //REGISTER AN AUTOLOADER
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/'
    ))->register();

    //CREATE A DI
    $di = new Phalcon\DI\FactoryDefault();

    //SETUP THE VIEW COMPONENT
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        return $view;
    });

    //SETUP A BASE URI SO THAT ALL GENERATED URIS INCLUDE THE "PHALCON" FOLDER
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/phalcon/');
        return $url;
    });

    // SETUP THE DATABASE SERVICE
    $di->set('db', function(){
        return new DbAdapter(array(
            "host"     => "localhost",
            "username" => "root",
            "password" => "",
            "dbname"   => "phalcon"
        ));
    });

    //HANDLE THE REQUEST
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}