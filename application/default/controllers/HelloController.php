<?php

class HelloController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function spanishAction()
    {
        $options = array(  
          'layout'   => 'internas',  
        );
        Zend_Layout::startMvc($options);
        
        // action body
        $this->view->title = "Español";
        $this->view->message = "<p style='color:red;text-align:center;'>Hola Mundo!</p>";
    }

    public function englishAction()
    {
        // action body
        $this->view->title = "INGLES";
        $this->view->message = "<p style='color:blue;text-align:center;'>Hello world!</p>";
    }


}