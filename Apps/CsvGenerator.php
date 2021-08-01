<?php

namespace Apps;

use PHPUnit\TextUI\XmlConfiguration\Csv;

class CsvGenerator
{

    private $fileMetaData;
    const _REPORT_FOLDER = 'public/downloads';
    public static $instance;

    private function __construct($data)
    {
        $this->fileMetaData = $data;
    }
  
    private function getFileLocation($fileName)
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/';

        $fileLocation = $protocol . $domainName . self::_REPORT_FOLDER . '/' . $fileName;

        return $fileLocation;
    }

    public static function getInstance($data)
    {

        if (!isset(CsvGenerator::$instance)) {
            CsvGenerator::$instance = new CsvGenerator($data);
        }

        return CsvGenerator::$instance;
    }

    public function generateCsvFile($contentData = null)
    {
        try {

           
            if (!file_exists(__DIR__ . '/../' . self::_REPORT_FOLDER)) {
                mkdir(__DIR__ . '/../' . self::_REPORT_FOLDER, 0777, true);
            }

            $filename   = 'Report-';
            $filename = $filename . ' - ' . date('Y-m-d') . ' at ' . date('g.i a');
            $dataArray = array('-1' => $filename) + $contentData;
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename="' . str_replace('"', '\\"', $filename) . '.csv"');
            $outstream = fopen("php://output", "w");

            function __outputCSV(&$vals, $key, $filehandler) {
                fputcsv($filehandler, $vals);
            }

            array_walk($dataArray, "__outputCSV", $outstream);
            fclose($outstream);
            //die();
             
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }


}
