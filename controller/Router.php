<?php
require_once 'controller/Request.php';
require_once 'view/View.php';
class Router  
{
    public function RouteRequest(){
        try {
            $request = new Request(array_merge($_GET,$_POST));
            $controler = $this->createController($request);
            $action = $this->createAction($request);
            $controler->exevuteAction($action);
        } catch (Exception $e) {
            echo $e;
        }
    }

    private function createController(Request $request){
        $controler = "Base";
        if($request->existParameters('controller')){
            $controler = ucfirst(strtolower($request->getParameter('controller')));
        }
        $fileControler = "controller/".$controler.".php";
        if (file_exists($fileControler)) {
            $controler = new $controler();
            $controler->SetRequest($request);
            return $controler;
        }else
        throw new Exception("file $fileControler not found in Router.php");
    }
    private function createAction(Request $request){
        $action = "index";
        if($request->existParameters("action")){
            $action = $request->getParameter('action');
        }
        return $action;
    }
    //TODO handle error
}

?>