<?php

namespace Reports;

use Apps\DatabaseConnection; 

abstract class AbstractReport
{ 
    private $databaseConnection;
    const _TURNOVER_PER_BRAND = 'TURNOVER_PER_BRAND'; 
    const _TURNOVER_PER_DAY = 'TURNOVER_PER_DAY';
    const _TURNOVER_TOP_SELLING = 'TURNOVER_TOP_SELLING';
    
    abstract public function getReportData(array $requestData);
    
    private function getDbConnection()
    {
        if (!isset($this->databaseConnection)) {
            $this->setDatabaseConnection();
        }
        return $this->databaseConnection;
    }

    private function setDatabaseConnection()
    {
        $connection = DatabaseConnection::getInstance();
        $this->databaseConnection = $connection->getConnction();
    }

    public function getReportsDataFromDatabase($sqlQuery = null)
    {
        $data = array();

        if (!isset($sqlQuery)) {
            throw new \Exception('Invalid sql Query');
        }

        $result = $this->getDbConnection()->query($sqlQuery);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getObjectStructuredReportData($map, $reportData)
    {
        $data = array();
        $mapper = $map;

        foreach ($reportData as $key => $value) {
            if (isset($mapper[$key])) {
                $data[$mapper[$key]] = $value;
            }
        }

        return $data;
    }

   
  
}
