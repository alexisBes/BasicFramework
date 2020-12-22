<?php
require_once 'core/Request.php';
require_once 'view/View.php';

abstract class Controler
{
    private $action;
    protected $request;

    public function setRequest(Request $request){
        $this->request = $request;
    }
    public function execAction($action){
        if(method_exists($this,$action)){
            $this->action = $action;
            $this->{$this->action}();
        }else {
            $classControler =get_class($this);
            throw new Exception("Action $action cannot be found in $classControler");
        }
    }

    public abstract function index();

    protected function generateView($dataView){
        $class = get_class($this);
        $view= new View($this->action,$class);
        $view->generate($dataView);
    }
}


?>