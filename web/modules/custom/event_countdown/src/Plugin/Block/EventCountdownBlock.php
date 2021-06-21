<?php

namespace Drupal\event_countdown\Plugin\Block;

use Drupal;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'event_countdown' Block.
 *
 * @Block(
 *   id = "event_countdown_block",
 *   admin_label = @Translation("Event countdown block"),
 *   category = @Translation("My custom block"),
 * )
 */

class EventCountdownBlock extends BlockBase {

  public function build() {

    $node = Drupal::routeMatch()->getParameter('node');

    if ($node->getType() == "event") {

      $date = $node->field_date->value;

      $output = Drupal::service('event_countdown.date_calculator')->EventCountdown($date);
    }
      return [

        '#markup' => $output,
        '#cache' => [
          'max-age' => 0,
        ],
      ];
    }// end of build



} // end of class
