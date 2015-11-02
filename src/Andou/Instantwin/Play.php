<?php

namespace Andou\Instantwin;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Time
 *
 * @author andou
 */
class Play {

  /**
   *
   * @var \Andou\Instantwin\Playprovider
   */
  protected $_play_provider;

  public function __construct(\Andou\Instantwin\Playprovider $play_provider) {
    $this->_play_provider = $play_provider;
  }

  /**
   * Restituisce la percentuale di tempo rimanente per assegnare le vittorie
   * 
   * @return float
   */
  public function getCompletionPercentage() {
    return 0.5;
  }

  /**
   * Restituisce le giocate attuali
   * 
   * @return int
   */
  public function getPlaysCount() {
    return $this->_play_provider->getPlaysCount();
  }

  /**
   * Restitusice il numero di vittorie fino a questo momento
   * 
   * @return int
   */
  public function getCurrentWinCount() {
    return $this->_play_provider->getCurrentWinCount();
  }

}
