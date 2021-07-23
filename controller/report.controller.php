<?php
require_once '../config/includes.php';

if($_POST['reportType'] && $_POST['startDate'] && $_POST['endDate']){
 
    try {
    
        $reportType = trim($_POST['reportType']);
        $startDate = date("Y-m-d",strtotime(trim($_POST['startDate'])));
        $endDate = date("Y-m-d",strtotime(trim($_POST['endDate'])));
  
        if($reportType){
            $reportObj = new report();
            $reportObj->genarateReport($reportType, $startDate, $endDate);
        
        }else{
            error_log('Trying to request invalid report.');
            $eroor = 'Sorry! Invalid Report Type ,Please Try Again';

            header('Location:'.SITE_URL.'?e='. $eroor);
            exit;
        }
    
    } catch (Exception $e) {
        error_log($e->getMessage());
        $eroor = 'Sorry! Invalid Report Type ,Please Try Again. '.$e->getMessage();
        header('Location:'.SITE_URL.'?e='. $eroor);
        exit;
    }

}else{
    $eroor = 'Sorry! Invalid Request ,Please Try Again';
    header('Location:'.SITE_URL.'?e='. $eroor);
    exit;
}

?>