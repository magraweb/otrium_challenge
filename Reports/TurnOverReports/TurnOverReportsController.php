<?php
namespace Reports\TurnOverReports;

//require_once ('e:/xampp/htdocs/task_new/Config/config.php'); 
require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsService.php'); 
require_once (DOC_ROOT.'Apps/CsvGenerator.php'); 

use Apps\CsvGenerator;

class TurnOverReportsController
{
    private $reportService;

    function __construct()
    {
        $this->reportService = new TurnOverReportsService();
    }
 
    public function turnOverPerBrand($requestData)
    {  
        $data = null; 
       try {

            if (empty($requestData)) {
                throw new \Exception("Invalid Request Data");
            }

            $dataObj = $this->reportService->turnOverPerBrandReport($requestData); 
            $fileGenerator = CsvGenerator::getInstance(['Brand','Total (With Tax)','Total (WithOut Tax)']); 
            $data = $fileGenerator->generateCsvFile($dataObj,(array) $fileGenerator);
            return $data;
        } 
        catch (\Exception $e) { 
            $message = $e->getMessage(); 
        } 
    
    }

    public function turnoverPerDay($requestData)
    {  
        $data = null; 
       try {

            if (empty($requestData)) {
                throw new \Exception("Invalid Request Data");
            }

            $dataObj = $this->reportService->turnOverPerDayReport($requestData); 
            $fileGenerator = CsvGenerator::getInstance(['Date','Total (With Tax)','Total (WithOut Tax)']); 
            $data = $fileGenerator->generateCsvFile($dataObj,(array) $fileGenerator);
            return $data;
        } 
        catch (\Exception $e) { 
            $message = $e->getMessage(); 
        } 
    
    }

    public function turnoverTopSelling($requestData)
    {  
        $data = null; 
       try {

            if (empty($requestData)) {
                throw new \Exception("Invalid Request Data");
            }

            $dataObj = $this->reportService->turnOverTopSelling($requestData); 
            $fileGenerator = CsvGenerator::getInstance(['Brand','Total (With Tax)','Total (WithOut Tax)']); 
            $data = $fileGenerator->generateCsvFile($dataObj,(array) $fileGenerator);
            return $data;
        } 
        catch (\Exception $e) { 
            $message = $e->getMessage(); 
        } 
    
    }
 
}
