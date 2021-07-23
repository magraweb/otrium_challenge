<?php

class db
{
        public $sqlcon;

        public function __construct()
        {
            try {
                $this->sqlcon = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
                if ($this->sqlcon->connect_error) {
                    throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
                 }
            } catch (Exception $e) {
                throw $e;
            }
        }

        public function getBrandWiseData($startDate, $endDate)
        {
            try {
                $data = array();
                $query = "SELECT brands.name, CAST(gmv.date AS DATE), (gmv.turnover*0.79) AS finalturnover FROM brands LEFT JOIN gmv ON brands.id=gmv.brand_id WHERE gmv.date BETWEEN '".$startDate."' AND '".$endDate."'";
                $result = $this->sqlcon->query($query);

                if ($result->num_rows > 0) {
                
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array_values($row);
                    }
                }
                return $data;
            } catch (Exception $e) {
                throw $e;
            }
        }        

        public function getDayWiseData($startDate, $endDate)
        {
            try {
                $data = array();
                $query = "SELECT CAST(date AS DATE),SUM(turnover*0.79) AS finalturnover FROM gmv WHERE date BETWEEN '".$startDate."' AND '".$endDate."' GROUP BY date";
                $result = $this->sqlcon->query($query);
 
                if ($result->num_rows > 0) {
                
                    while ($row = $result->fetch_assoc()) {
                        $data[] = array_values($row);
                    }
                }

                return $data;
            } catch (Exception $e) {
                throw $e;
            }
        }
 
}
?>