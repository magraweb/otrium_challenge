<?php 

namespace Apps;

//require_once  ('Routes/web.php');
//require_once ('../boostrap.php');
require_once ('../Config/config.php'); 
require_once ('e:/xampp/htdocs/task_new/Model/TurnOverPerBrand.php');
require_once ('e:/xampp/htdocs/task_new/Model/TurnoverPerDay.php');
require_once ('e:/xampp/htdocs/task_new/Model/TurnoverTopSelling.php');


class AppsContoller
{
    private $request_url;
   // private $routeConfig;
    private $webArray;

    const _REPORT = 'reports';

    public function __construct()
    { 
        $this->setRoute('TurnOverPerBrand'); //$_GET
        $this->RunActionReport(); 
    }

    private function getRoute()
    { 
        return $this->request_url;
    }

    function setRoute($url)
	{
		$this->request_url = $url;
	}

    public function RunActionReport()
    {
        echo 'working';

        echo $_REQUEST['action'];

        if ($this->getRoute()) { 

            $class =  $this->getRoute();
            $classObj = new  $class();
            $data = $classObj->{$this->getRoute()};

            print_r($data);

            //header('Location:'.SITE_URL.'?e='. $data);

        } else {
            throw new \Exception('Request Url Not Found');
            //header('Location:'.SITE_URL.'?e=Request Url Not Found');

        }
    }

}

 
try {
    $actionFactory = new  AppsContoller();
} catch (\Exception $e) {
    echo $e->getMessage();
}
