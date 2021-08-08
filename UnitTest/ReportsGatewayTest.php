<?php declare(strict_types=1);

require_once ('e:/xampp/htdocs/task_new/Config/config.php');
error_reporting(E_ALL);

require_once (DOC_ROOT.'Model/TurnOverPerBrand.php');
require_once (DOC_ROOT.'Model/TurnoverPerDay.php');
require_once (DOC_ROOT.'Model/TurnoverTopSelling.php');

require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsController.php');
require_once (DOC_ROOT.'Reports/TurnOverReports/TurnOverReportsGateway.php');
require_once (DOC_ROOT.'Apps/Healper/MapData.php');
require_once (DOC_ROOT.'Apps/CsvGenerator.php'); 

use \PHPUnit\Framework\TestCase;
use Model\TurnoverPerBrand as TurnoverPerBrand;
use Model\TurnoverPerDay as TurnoverPerDay;
use Model\TurnoverTopSelling as TurnoverTopSelling; 
use Reports\TurnOverReports as Tor;

class TurnOverReportsGatewayTest extends TestCase
{

    public function testTurnOverPerBrand()
    { 
        $reqArr=array(
            'startDate'=>'2018-05-01',
            'endDate'=> '2018-05-07',
            'reportType'=> 'TURNOVER_PER_BRAND'
        );
  
        $TurnOverReportsGateway = new Tor\TurnOverReportsGateway();
        $responceData = $TurnOverReportsGateway->getReportData($reqArr);
        
        $this->assertIsArray(
            $responceData,
            "assert variable is array or not"
        );

        $filename= DOC_ROOT.'UnitTest/test_data/'.$reqArr['reportType'].'_'.rand(1,99).time().'.csv';
 
        Apps\CsvGenerator::generateCsvFileForTest($responceData ,$filename);

    }

    public function testTurnoverPerDay()
    { 
        $reqArr=array(
            'startDate'=>'2018-05-01',
            'endDate'=> '2018-05-07',
            'reportType'=> 'TURNOVER_PER_DAY'
        );
  
        $TurnOverReportsGateway = new Tor\TurnOverReportsGateway();
        $responceData = $TurnOverReportsGateway->getReportData($reqArr);

        $this->assertIsArray(
            $responceData,
            "assert variable is array or not"
        );
 
        $filename= DOC_ROOT.'UnitTest/test_data/'.$reqArr['reportType'].'_'.rand(1,99).time().'.csv';

        Apps\CsvGenerator::generateCsvFileForTest($responceData ,$filename);

    }

    public function testTurnoverTopSelling()
    { 
        $reqArr=array(
            'startDate'=>'2018-05-01',
            'endDate'=> '2018-05-07',
            'reportType'=> 'TURNOVER_TOP_SELLING'
        );
  
        $TurnOverReportsGateway = new Tor\TurnOverReportsGateway();
        $responceData = $TurnOverReportsGateway->getReportData($reqArr);

        $this->assertIsArray(
            $responceData,
            "assert variable is array or not"
        );
 
        $filename= DOC_ROOT.'UnitTest/test_data/'.$reqArr['reportType'].'_'.rand(1,99).time().'.csv';
        
        Apps\CsvGenerator::generateCsvFileForTest($responceData ,$filename);

    }
 
}
