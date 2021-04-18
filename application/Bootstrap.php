<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload() 
     { 
          $autoloader = Zend_Loader_Autoloader::getInstance();
            $autoloader->registerNamespace('App_')->setFallbackAutoloader(true);
            $resourceAutoloader = new Zend_Loader_Autoloader_Resource(
                array(
                        'basePath' => APPLICATION_PATH,
                        'namespace' => 'App',
                        'resourceTypes' => array(
                                            'form' => array('path'=> 'forms/', 'namespace' => 'Form'),
                                            'model' => array('path' => 'models/', 'namespace' => 'Model')
                                        )
                       )
             );
          return $moduleLoader; 
     } 
     
 function _initViewHelpers() 
    { 
       $this->bootstrap('layout'); 
       $layout = $this->getResource('layout'); 
       $view = $layout->getView(); 
       $view->doctype('HTML5'); 
       $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8'); 
       $view->headTitle()->setSeparator(' - '); 
       $view->headTitle('Primeros pasos en Zend Framework'); 
    }
    
    protected function _initPluginResource()
    {       
        $rootPath = ROOT_PATH;
        set_include_path(
            $rootPath .PATH_SEPARATOR.
            APPLICATION_PATH.PATH_SEPARATOR.
            APPLICATION_PATH.'config'.PATH_SEPARATOR.
            APPLICATION_PATH.'controllers'.PATH_SEPARATOR.
            APPLICATION_PATH.'modules'.PATH_SEPARATOR.
            APPLICATION_PATH.'layouts'.PATH_SEPARATOR.
            get_include_path()
        );
        $autoloader = Zend_Loader_Autoloader::getInstance()
                    ->suppressNotFoundWarnings(true)
                    ->setFallbackAutoloader(true);
        $connection = $this->getPluginResource("db");
        $adapter = $connection->getAdapter();
        $db = Zend_Db::factory($adapter,$connection->getParams());
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        Zend_Registry::set('default', $db);
    }
    

}

