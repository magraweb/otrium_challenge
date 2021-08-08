<?php

namespace Reports\TurnOverReports;

require_once ('e:/xampp/htdocs/task_new/Config/config.php'); 
require_once (DOC_ROOT.'Reports/AbstractReport.php'); 
require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsService.php'); 
require_once (DOC_ROOT.'Apps/DatabaseConnection.php');  
require_once (DOC_ROOT.'Apps/Healper/MapData.php');   

use Exception;
use Reports\AbstractReport;
use Apps\Helpers\MapData;
use Model\TurnoverPerBrand;
use Model\TurnoverPerDay;
use Model\TurnoverTopSelling;

class TurnOverReportsGateway extends AbstractReport
{

    public function getReportData(array $requestData)
    {
  
        $retuenArray = array();

        if (empty($requestData)) {
            throw new \Exception('Request Data Empty');
        }

        $startDate = $requestData['startDate'];
        $endDate = $requestData['endDate'];
        $reportType = $requestData['reportType'];
        
        if ($reportType == parent::_TURNOVER_PER_BRAND) {
           
            $sql = "SELECT brands.name,(gmv.turnover) AS turnover, (gmv.turnover*0.79) AS finalturnover FROM brands LEFT JOIN gmv ON brands.id=gmv.brand_id WHERE gmv.date BETWEEN '".$startDate."' AND '".$endDate."'";
            $data = $this->getReportsDataFromDatabase($sql); 
            $retuenArray=$data; 

        } elseif ($reportType == parent::_TURNOVER_PER_DAY) {

            $sql = "SELECT gmv.date AS selldate ,SUM(gmv.turnover) AS turnover, SUM(turnover*0.79) AS finalturnover FROM gmv WHERE date BETWEEN '".$startDate."' AND '".$endDate."' GROUP BY date";

            $data = $this->getReportsDataFromDatabase($sql);
            $retuenArray = $data;  

        } elseif ($reportType == parent::_TURNOVER_TOP_SELLING) {

            $sql = "SELECT brands.name AS brandname ,SUM(gmv.turnover) AS turnover, SUM(turnover*0.79) AS finalturnover FROM gmv LEFT JOIN brands ON brands.id=gmv.brand_id WHERE date BETWEEN '".$startDate."' AND '".$endDate."' GROUP BY brandname ORDER BY finalturnover DESC LIMIT 10"; 
            $data = $this->getReportsDataFromDatabase($sql); 
            $retuenArray = $data;

        } else {
                throw new \Exception('Report type not found');
        } 

        return $retuenArray;
    }
 
 
 
 
}
