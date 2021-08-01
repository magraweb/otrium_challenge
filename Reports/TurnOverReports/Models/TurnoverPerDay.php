<?php

namespace Reports\TurnOverReports\Models;

class TurnoverPerDay
{
    private $day;
    private $totalTurnOver;
  
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
        $data['day'] = $this->day;
        $data['totalTurnOver'] = $this->totalTurnOver; 
        return $data;
    }
}
