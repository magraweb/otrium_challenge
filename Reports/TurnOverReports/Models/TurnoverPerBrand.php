<?php

namespace Reports\TurnOverReports\Models;

class TurnoverPerBrand
{ 
    private $brandName;
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
        $data['totalTurnOver'] = $this->totalTurnOver; 
        return $data;
    }
}
