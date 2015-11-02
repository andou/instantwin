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
   * @return boolean
   */
  public function check() {
    return \Andou\InstantWin::app()->getRand()->rand() <= \Andou\Instantwin::app()->getDistribution()->getOdds();
  }

}
