<?php

namespace Reports\TurnOverReports\Models;

class TurnoverTopSelling
{
    private $brandName;
    private $day;
    private $totalTurnOver;
   
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;
        return $this;
    }
 
    public function getBrandName()
    {
        return $this->brandName;
    }
    
    public function setDay($day)
    {
        $this->day = $day;
        return $this;
    }
 
    public function getDay()
    {
        return $this->day;
    }
 
    public function setTotalTurnOver($totalTurnOver)
    {
        $this->totalTurnOver = $totalTurnOver;
        return $this;
    }
 
    public function getTotalTurnOver()
    {
        return $this->totalTurnOver;
    }
 
    public function toArray()
    {
        $data = array();
        $data['brandName'] = $this->brandName;
        $data['day'] = $this->day;
        $data['totalTurnOver'] = $this->totalTurnOver; 
        return $data;
    }
}
