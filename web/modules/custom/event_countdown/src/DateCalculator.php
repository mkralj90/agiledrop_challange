<?php

namespace Drupal\event_countdown;

class dateCalculator{


  public function EventCountdown($date) {
    $difference = $this->Difference($date);
    // future event
    if($difference >= 1) {
      return $difference . " days left until event starts";
      // same day event
    } else if($difference == 0) {
      return "This event is happening today";
      // past event
    } else{
      return "This event already passed " . abs($difference) . " days ago" ;
    }

  }


  // difference between now and event date
  public function Difference($date) {

    $now = time();
    $event_date = strtotime($date);
    $difference = $event_date - $now;
    return round($difference / (60 * 60 * 24));
  }

} // end of class
