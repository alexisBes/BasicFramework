<?php
require_once 'Config.php';

class View  
{
    private $file;
    private $title;

    public function __construct($action,$controller){
        $this->file = "view/".$controller."/".$action.".php";
    }

    public function generate($data){
        $content = $this->generateFile($this->file,$data);
        $webRoot = Config::get("webRoot","/");
        $view = $this->generateFile('view/Base.php',array('title' => $this->title,'content' => $content,'webRoot'=>$webRoot));

        echo $view;
    }

    private function generateFile($file,$data){
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }else {
            throw new Exception("File $file not found in View.php");
        }
    }

    private function clean($valeur) {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
      }
}


?>