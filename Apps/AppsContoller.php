<?php
namespace Apps;
//require_once  ('Routes/web.php');
require_once ('../boostrap.php');
require_once ('../Config/config.php');

class AppsContoller
{
    private $request_url;
    private $routeConfig;
    private $webArray;

    const _REPORT = 'reports';

    public function __construct()
    {
        $this->request_url = $_SERVER['REQUEST_URI'];
  
        $this->RunActionReport();
 
    }

    private function getRoute()
    {
        if (!isset($this->routeConfig)) {
            $this->setRoute();
        }

        return $this->routeConfig;
    }

    private function setRoute()
    {
        //$this->routeConfig = $this->webArray;
        $this->routeConfig = include 'Routes/web.php';
    }

    public function RunActionReport()
    {
        echo 'working';
        if ($this->getRoute()['routes'][$this->request_url]) {
 
            // get the raw POST data
            $rawData = file_get_contents("php://input");
  
            $class =  $this->getRoute()['routes'][$this->request_url]['controller'];
            $classObj = new  $class();
            $data = $classObj->{$this->getRoute()['routes'][$this->request_url]['action']}($rawData);

            header('Location:'.SITE_URL.'?e='. $data);

        } else {
            throw new \Exception('Request Url Not Found');
            header('Location:'.SITE_URL.'?e=Request Url Not Found');

        }
    }

}
