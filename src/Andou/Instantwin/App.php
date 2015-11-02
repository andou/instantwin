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
   * Gestore delle configurazioni
   *
   * @var Andou\Inireader\Inireader\Inireader
   */
  protected $_config;

  /**
   * File di configurazione
   *
   * @var string
   */
  protected $_config_file;

  /**
   * Base path dell'applicazionet
   *
   * @var string
   */
  protected $_base_path;

  /**
   * Gestore della giocata corrente
   *
   * @var \Andou\Instantwin\Play
   */
  protected $_play;

  /**
   * Determina se la giocata corrente è vincente oppure no
   * 
   * @return boolean
   */
  public function win() {
    $res = $this->getOdds()->check();
    $this->endPlay();
    return $res;
  }

  /**
   * Inizializza l'applicazione
   * 
   */
  public function init($base_path, $config_file) {
    $this->_base_path = $base_path;
    $this->_config_file = $this->_base_path . $config_file;
    $this->initPlay();
  }

  /**
   * Restituisce un gestore delle configurazioni
   * 
   * @return Andou\Inireader\Inireader\Inireader
   */
  public function getConfig() {
    if (!isset($this->_config)) {
      $this->_config = Inireader::getInstance($this->_config_file, true);
    }
    return $this->_config;
  }

  /**
   * Restituisce il base path dell'applicazione
   * 
   * @return type
   */
  public function getBasePath() {
    return $this->_base_path;
  }

  /**
   * Restituisce un randomizzatore
   * 
   * @return \Andou\Instantwin\Rand
   */
  public function getRand() {
    return new \Andou\Instantwin\Rand();
  }

  /**
   * Restituisce un checker di probabilità
   * 
   * @return \Andou\Instantwin\Odds
   */
  public function getOdds() {
    return new \Andou\Instantwin\Odds();
  }

  /**
   * Restituisce un gestore della distribuzione delle vincite
   * 
   * @return \Andou\Instantwin\Distribution
   */
  public function getDistribution() {
    return new \Andou\Instantwin\Distribution();
  }

  /**
   * Restituisce un gestore della giocata già inizializzato
   * 
   * @return \Andou\Instantwin\Play
   */
  public function getPlay() {
    return $this->initPlay();
  }

  /**
   * Inizializza un gestore della giocata
   * 
   * @return \Andou\Instantwin\Play
   */
  protected function initPlay() {
    if (!isset($this->_play)) {
      $provider_type = "\\Andou\\Instantwin\\Playprovider\\" . $this->getConfig()->getProvidersPlay();
      $play_provider = new $provider_type();
      $this->_play = new \Andou\Instantwin\Play($play_provider);
      $this->_play->startPlay();
    }
    return $this->_play;
  }

  /**
   * Termina la giocata corrente
   */
  protected function endPlay() {
    $this->_play->endPlay();
  }

}
