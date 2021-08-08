<?php

namespace Apps;

//require_once ('../Config/config.php'); 
require_once ('e:/xampp/htdocs/task_new/Config/config.php'); 

use PHPUnit\TextUI\XmlConfiguration\Csv;

class CsvGenerator
{

    public $fileMetaData;
    const _REPORT_FOLDER = DOC_ROOT.'public/downloads';
    public static $instance;

    private function __construct($data)
    {
        $this->fileMetaData = $data;
    } 

    public static function getInstance($data)
    {

        if (!isset(CsvGenerator::$instance)) {
            CsvGenerator::$instance = new CsvGenerator($data);
        }

        return CsvGenerator::$instance;
    }

    public function generateCsvFile($contentData = null,array $fileMetaData)
    {
    
        try { 
            if (!file_exists(DOC_ROOT.self::_REPORT_FOLDER)) {
                mkdir(DOC_ROOT.self::_REPORT_FOLDER, 0777, true);
            }

            $filename   = 'Report-';
            $filename = $filename . ' - ' . date('Y-m-d') . ' at ' . date('g.i a').'.csv';
        
            $output = fopen("php://output",'w') or die("Can't open php://output");
            header("Content-Type:application/csv"); 
            header("Content-Disposition:attachment;filename=".$filename.""); 
            fputcsv($output, (array)$fileMetaData['fileMetaData']);
            foreach($contentData as $product) {
                fputcsv($output, $product);
            }
            fclose($output) or die("Can't close php://output");
            die();
            

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    public static function generateCsvFileForTest($contentData = null, $filename= null)
    {
    
        try { 

            $fp = fopen($filename, 'wb');
            //Write the header
            fputcsv($fp, array_keys($contentData[0]));
            //Write fields
            foreach ($contentData as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

 
    

}
