<?php
 
class report
{
        public $dbcon;

        public function __construct()
        {
            try {      
             $this->dbcon = new db();

            } catch (Exception $e) {
                throw $e;
                error_log($e);
            }
        }

        public function genarateReport($reportType, $startDate, $endDate)
        {
            try {
                if($reportType=="brandwise"){
                    $data = $this->dbcon->getBrandWiseData($startDate, $endDate);
                    if(!empty($data)){
                        $this->exportCsv(array('Brand Name','Date','Turnover'),$data,'brand-wise-report');
                    }else{
                        throw new Exception("Data not found related to the request");
                        error_log("Data not found related to the date range");
                    }
                }elseif($reportType=="daywise"){
                    $data = $this->dbcon->getDayWiseData($startDate, $endDate);
                    if(!empty($data)){
                        $this->exportCsv(array('Date','Total Turnover'),$data,'day-wise-report');
                    }else{
                        throw new Exception("ReportType not found related to the request");
                        error_log("Data not found related to the date range");
                    }
                }else{
                    error_log("ReportType is not found");
                }

            } catch (Exception $e) {
                throw $e;
                error_log($e);
            }
        }

        public function exportCsv($headers, $dataArray, $filename) {
            try {
                $filename = $filename . ' - ' . date('Y-m-d') . ' at ' . date('g.i a');
                $dataArray = array('-1' => $headers) + $dataArray;
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename="' . str_replace('"', '\\"', $filename) . '.csv"');
                $outstream = fopen("php://output", "w");

                function __outputCSV(&$vals, $key, $filehandler) {
                    fputcsv($filehandler, $vals);
                }

                array_walk($dataArray, "__outputCSV", $outstream);
                fclose($outstream);
                die();
            } catch (Exception $e) {
                throw $e;
                error_log($e);
            }
        }

}


?>

