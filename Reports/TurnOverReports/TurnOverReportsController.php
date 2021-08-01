<?php
namespace Reports\TurnOverReports;

use Apps\CsvGenerator;

class TurnOverReportsController
{
    private $reportService;

    function __construct()
    {
        $this->reportService = new TurnOverReportsService();
    }
 
    public function turnOverPerBrandAction($requestData)
    { 

        $data = null;

       try {

            if (empty($requestData)) {
                throw new \Exception("Invalid Request Data");
            }

            $status = true; 
            $dataObj = $this->reportService->turnOverPerBrandReport($requestData); 
            $fileGenerator = CsvGenerator::getInstance(["Brand Name", "Total Turnover"]);  
            $data = $fileGenerator->generateCsvFile($dataObj);
            return $data;
        } 
        catch (\Exception $e) { 
            $message = $e->getMessage(); 
        } 
    
    }
 
}
