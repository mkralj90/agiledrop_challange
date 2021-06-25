<?php

namespace Drupal\event_countdown;

use DateTimeZone;
use Drupal\Core\Datetime\DrupalDateTime;

class dateCalculator{


  public function EventCountdown($date) {
    $difference = $this->Difference($date);

    if($difference == 1){
      $days = "day";
    }elseif($difference == -1){
      $days = "day";
    }else{
      $days = "days";
    }

    // future event
    if($difference >= 1) {
      return $difference . " " . $days . " left until event starts";
      // same day event
    } elseif($difference == 0) {
      return "This event is happening today";
      // past event
    } else{
      return "This event already passed " .abs($difference) . " " . $days .  " ago" ;
    }

  }

  // difference between now and event date
  public function Difference($date) {

    $now = new DrupalDateTime();
    $now->setTime(0,0);
    $time_now = $now->getTimestamp();

    $event_date = new DrupalDateTime($date);
    $event_date->setTime(0,0);
    $time_event = $event_date->getTimestamp();

    $difference = $time_event - $time_now;

    return $difference / 86400;

  }

} // end of class
