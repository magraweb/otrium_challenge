<?php 

namespace Apps;
 
require_once ('../Config/config.php'); 
require_once (DOC_ROOT.'Model/TurnOverPerBrand.php');
require_once (DOC_ROOT.'Model/TurnoverPerDay.php');
require_once (DOC_ROOT.'Model/TurnoverTopSelling.php');
require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsController.php'); 
require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsService.php'); 
 
use Reports\TurnOverReports as Tor;

class AppsContoller
{
    private $request_url;
    private $start_date;
    private $end_date;
  
    public function __construct()
    {   
        $this->setStartDate(date("Y-m-d",strtotime(trim($_POST['startDate'])))); //'2018-05-01'
        $this->setEndDate(date("Y-m-d",strtotime(trim($_POST['endDate'])))); //$_GET'2018-05-07'
        $this->setRoute(trim($_POST['reportType'])); // turnOverPerBrand  | turnoverPerDay | turnoverTopSelling
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

    private function getStartDate()
    { 
        return $this->start_date;
    }

    function setStartDate($startDate)
	{
		$this->start_date = $startDate;
	}

    private function getEndDate()
    { 
        return $this->end_date;
    }

    function setEndDate($endDate)
	{
		$this->end_date = $endDate;
	}

    public function RunActionReport()
    { 
        $reqArr=array(
            'startDate'=> $this->getStartDate(),
            'endDate'=> $this->getEndDate(),
            'reportType'=>$this->getRoute()
        );
 
        if ($this->getRoute()) { 
 
            $classObj = new Tor\TurnOverReportsController(); 
            $classObj->{$this->getRoute()}($reqArr); 

        } else {
            throw new \Exception('Request Url Not Found');  
        }
    }

}

 
try {
    $actionFactory = new  AppsContoller();
} catch (\Exception $e) {
    echo $e->getMessage();
}
