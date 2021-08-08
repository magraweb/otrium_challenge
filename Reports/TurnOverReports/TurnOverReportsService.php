<?php

namespace Reports\TurnOverReports;

use Reports\AbstractReport; 

require_once ('e:/xampp/htdocs/task_new/Config/config.php'); 
require_once (DOC_ROOT.'Reports/AbstractReport.php');   
require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsGateway.php');  

class TurnOverReportsService
{
    private $reportGateway;

    function __construct()
    {
        $this->reportGateway = new TurnOverReportsGateway;
    }

    public function turnOverPerBrandReport(array $requestData)
    {
         
        $requestData['reportType'] = AbstractReport::_TURNOVER_PER_BRAND; 
        $data = $this->reportGateway->getReportData($requestData);
  
        return $data;
    }

    public function turnOverPerDayReport(array $requestData)
    {
 
        $requestData['reportType'] = AbstractReport::_TURNOVER_PER_DAY; 
        $data = $this->reportGateway->getReportData($requestData);
       
        return $data;
    } 

    public function turnOverTopSelling(array $requestData)
    {
 
        $requestData['reportType'] = AbstractReport::_TURNOVER_TOP_SELLING; 
        $data = $this->reportGateway->getReportData($requestData);
       
        return $data;
    } 

}
