<?php declare(strict_types=1);

require_once ('e:/xampp/htdocs/task_new/Config/config.php'); 
require_once ('e:/xampp/htdocs/task_new/Model/TurnOverPerBrand.php');
require_once ('e:/xampp/htdocs/task_new/Model/TurnoverPerDay.php');
require_once ('e:/xampp/htdocs/task_new/Model/TurnoverTopSelling.php');

require_once ('e:/xampp/htdocs/task_new/Reports/TurnOverReports/TurnOverReportsController.php');
require_once ('e:/xampp/htdocs/task_new/Reports/TurnOverReports/TurnOverReportsGateway.php');
require_once ('e:/xampp/htdocs/task_new/Apps/Healper/MapData.php');

use \PHPUnit\Framework\TestCase;
use Model\TurnoverPerBrand as TurnoverPerBrand;
use Model\TurnoverPerDay as TurnoverPerDay;
use Model\TurnoverTopSelling as TurnoverTopSelling;
use Reports\TurnOverReports as Gateway;

class TurnOverReportsGatewayTest extends TestCase
{

    public function testTurnOverPerBrand()
    {
        $reportsGateway = new Gateway\TurnOverReportsGateway();
        $requestData['startDate'] = '2018-05-01';
        $requestData['endDate'] = '2018-05-07';  
        $requestData['reportType'] = 'TURNOVER_PER_BRAND';
        $data = $reportsGateway->getReportData($requestData);

        $this->assertIsArray($data);
        if (count($data) > 0) {
            $this->assertInstanceOf(TurnoverPerBrand::class, $data[0]);
        }
    }

    public function testTurnOverPerDay()
    {
        $reportsGateway = new Gateway\TurnOverReportsGateway();
        $requestData['startDate'] = '2018-05-01';
        $requestData['endDate'] = '2018-05-07';  
        $requestData['reportType'] = 'TURNOVER_PER_DAY';
        $data = $reportsGateway->getReportData($requestData);

        $this->assertIsArray($data);
        if (count($data) > 0) {
            $this->assertInstanceOf(TurnoverPerDay::class, $data[0]);
        }
    }

    public function testTurnoverTopSelling()
    {
        $reportsGateway = new Gateway\TurnOverReportsGateway();
        $requestData['startDate'] = '2018-05-01';
        $requestData['endDate'] = '2018-05-07';  
        $requestData['reportType'] = 'TURNOVER_TOP_SELLING';
        $data = $reportsGateway->getReportData($requestData);

        $this->assertIsArray($data);
        if (count($data) > 0) {
            $this->assertInstanceOf(TurnoverTopSelling::class, $data[0]);
        }
    }
}
