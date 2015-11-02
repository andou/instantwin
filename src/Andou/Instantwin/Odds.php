<?php

namespace Andou\Instantwin;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Checker
 *
 * @author andou
 */
class Odds {

  /**
   * 
   * @param float $odds
   * @return boolean
   */
  public function check($odds) {
    return \Andou\InstantWin::app()->getRand()->rand() <= $odds;
  }

}
