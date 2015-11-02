<?php

namespace Andou\Instantwin;

use Andou\Inireader\Inireader;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author andou
 */
class App {

  /**
   *
   * @var Andou\Inireader\Inireader\Inireader
   */
  protected $_config;

  /**
   *
   * @var string
   */
  protected $_config_file;

  /**
   * 
   */
  public function init($config_file) {
    $this->_config_file = $config_file;
  }

  /**
   * 
   * @return boolean
   */
  public function win() {
    return $this->getOdds()->check();
  }

  /**
   * 
   * @return Andou\Inireader\Inireader\Inireader
   */
  public function getConfig() {
    if (!isset($this->_config)) {
//      $config = Inireader::getInstance(__DIR__ . "/../../../configs/config.ini", true);
      $this->_config = Inireader::getInstance($this->_config_file, true);
    }
    return $this->_config;
  }

  /**
   * 
   * @return \Andou\Instantwin\Rand
   */
  public function getRand() {
    return new \Andou\Instantwin\Rand();
  }

  /**
   * 
   * @return \Andou\Instantwin\Odds
   */
  public function getOdds() {
    return new \Andou\Instantwin\Odds();
  }

  /**
   * 
   * @return \Andou\Instantwin\Distribution
   */
  public function getDistribution() {
    return new \Andou\Instantwin\Distribution();
  }

  /**
   * 
   * @return \Andou\Instantwin\Play
   */
  public function getPlay() {
    $provider_type = "\\Andou\\Instantwin\\Playprovider\\" . $this->getConfig()->getProvidersPlay();
    $play_provider = new $provider_type();
    return new \Andou\Instantwin\Play($play_provider);
  }

}
