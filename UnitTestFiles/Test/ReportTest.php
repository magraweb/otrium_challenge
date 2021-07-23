<?php

declare(strict_types=1);

namespace UnitTestFiles\Test;
use PHPUnit\Framework\TestCase;  
//use model\report;

require_once '../config/includes.php';

class ReportTest extends TestCase
{
    public function testgenarateReport()
    {  
        $startDate = '2018-05-01';
        $endDate = '2018-05-07'; 
        $reportType = 'brandwise';
      
        //$report = new report();
        $data=$this->assertArrayNotHasKey($reportType, $startDate, $endDate);

        $this->assertArrayNotHasKey($reportType, $startDate, $endDate);
       
    }
}

 
