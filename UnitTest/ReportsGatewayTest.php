<?php declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use Reports\TurnOverReports\Models\TurnoverPerBrand;
use Reports\TurnOverReports\Models\TurnoverPerDay;
use Reports\TurnOverReports\Models\TurnoverTopSelling;


class TurnOverReportsGatewayTest extends TestCase
{

    public function testTurnOverPerBrand()
    {
        $reportsGateway = new Reports\TurnOverReports\TurnOverReportsGateway();
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
        $reportsGateway = new Reports\TurnOverReports\TurnOverReportsGateway();
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
        $reportsGateway = new Reports\TurnOverReports\TurnOverReportsGateway();
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
