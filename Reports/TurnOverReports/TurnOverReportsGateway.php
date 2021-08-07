<?php

namespace Reports\TurnOverReports;

include('e:/xampp/htdocs/task_new/Reports/AbstractReport.php'); 
include('e:/xampp/htdocs/task_new/Apps/DatabaseConnection.php'); 


use Exception;
use Reports\AbstractReport;
use Apps\Helpers\MapData;
use Model\TurnoverPerBrand;
use Model\TurnoverPerDay;
use Model\TurnoverTopSelling;

class TurnOverReportsGateway extends AbstractReport
{

    private $map = [
        MapData::_DATABASE_MAP => [
            parent::_TURNOVER_PER_BRAND => [
                'name' => 'brandName',
                'sum'  => 'totalTurnOver'
            ],
            parent::_TURNOVER_PER_DAY => [
                'date' => 'day',
                'sum'  => 'totalTurnOver'
            ],
            parent::_TURNOVER_TOP_SELLING => [
                'name' => 'brandName',
                'date'  => 'day',
                'sum'  => 'totalTurnOver'
            ] 
        ]
    ];

    public function getReportData(array $requestData)
    {

        $objectArray = [];

        if (empty($requestData)) {
            throw new \Exception('Request Data Empty');
        }

        $startDate = $requestData['startDate'];
        $endDate = $requestData['endDate'];
        $reportType = $requestData['reportType'];

        if ($reportType === parent::_TURNOVER_PER_BRAND) {

            $sql = "SELECT brands.name, SUM(gmv.turnover - (gmv.turnover * 21/100)) as sum FROM brands
                LEFT JOIN gmv ON brands.id = gmv.brand_id 
                WHERE gmv.date BETWEEN $startDate AND $endDate  GROUP BY gmv.brand_id ";

            $data = $this->getReportsDataFromDatabase($sql);
  
            foreach ($data as $reportData) {
                $structReportData = $this->getObjectStructuredReportData(
                    $this->map[MapData::_DATABASE_MAP][parent::_TURNOVER_PER_BRAND],
                    $reportData
                );

                $objectArray[] = $this->hydrateTurnoverPerBrandData($structReportData);
            }

        } elseif ($reportType === parent::_TURNOVER_PER_DAY) {

            $sql = "SELECT gmv.date, SUM(gmv.turnover - (gmv.turnover * 21/100))  as sum from brands 
            LEFT JOIN gmv ON brands.id = gmv.brand_id 
            WHERE gmv.date BETWEEN $startDate AND $endDate GROUP BY gmv.date " ;

            $data = $this->getReportsDataFromDatabase($sql);
 
            foreach ($data as $reportData) {
                $structReportData = $this->getObjectStructuredReportData(
                    $this->map[MapData::_DATABASE_MAP][parent::_TURNOVER_PER_DAY],
                    $reportData
                );

                $objectArray[] = $this->hydrateTurnoverPerDayData($structReportData);
            }

        } elseif ($reportType === parent::_TURNOVER_TOP_SELLING) {

            $sql = "SELECT brands.name,gmv.date, SUM(gmv.turnover - (gmv.turnover * 21/100))  as sum from brands 
            LEFT JOIN gmv ON brands.id = gmv.brand_id 
            WHERE gmv.date BETWEEN $startDate AND $endDate  GROUP BY gmv.date " ;

            $data = $this->getReportsDataFromDatabase($sql);
 
            foreach ($data as $reportData) {
                $structReportData = $this->getObjectStructuredReportData(
                    $this->map[MapData::_DATABASE_MAP][parent::_TURNOVER_PER_DAY],
                    $reportData
                );

                $objectArray[] = $this->hydrateTurnoverTopSellingData($structReportData);
            }

        } else {
                throw new \Exception('Report type not found');
        } 

        return $objectArray;
    }
 
 
    private function hydrateTurnoverPerBrandData(array $perBrandData, TurnoverPerBrand $turnoverPerBrandObj = null)
    {
        $turnoverPerBrandObj = new TurnoverPerBrand();

        if (!empty($perBrandData['brandName'])) {
            $turnoverPerBrandObj->setBrandName($perBrandData['brandName']);
        }

        if (!empty($perBrandData['totalTurnOver'])) {
            $turnoverPerBrandObj->setTotalTurnOver($perBrandData['totalTurnOver']);
        }

        return $turnoverPerBrandObj;
    }

    private function hydrateTurnoverPerDayData(array $perDayData, TurnoverPerDay $turnoverPerDayObj = null)
    {
        $turnoverPerDayObj = new TurnoverPerDay();

        if (!empty($perDayData['day'])) {
            $turnoverPerDayObj->setDay($perDayData['day']);
        }

        if (!empty($perDayData['totalTurnOver'])) {
            $turnoverPerDayObj->setTotalTurnOver($perDayData['totalTurnOver']);
        }

        return $turnoverPerDayObj;
    }

    private function hydrateTurnoverTopSellingData(array $perDayData, TurnoverPerDay $turnoverTopSellingObj = null)
    {
  
        $turnoverTopSellingObj = new TurnoverTopSelling();
     
        if (!empty($perBrandData['brandName'])) {
            $turnoverTopSellingObj->setBrandName($perBrandData['brandName']);
        }

        if (!empty($perDayData['day'])) {
            $turnoverTopSellingObj->setDay($perDayData['day']);
        }

        if (!empty($perDayData['totalTurnOver'])) {
            $turnoverTopSellingObj->setTotalTurnOver($perDayData['totalTurnOver']);
        }

        return $turnoverTopSellingObj;
    }

 
}
