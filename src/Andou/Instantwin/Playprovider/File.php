<?php

namespace Andou\Instantwin\Playprovider;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of File
 *
 * @author andou
 */
class File extends \Andou\Instantwin\Playprovider {

  /**
   *
   * @var string
   */
  protected static $_lock_file = 'play.lock';

  /**
   *
   * @var string
   */
  protected static $_res_folder = '/../../res/';

  /**
   * Inizializza la gestione delle giocate
   */
  public function init() {
    ;
  }

  /**
   * Determina l'inizio di una giocata
   */
  public function startPlay() {
    
  }

  /**
   * Determina la fine di una giocata
   */
  public function endPlay() {
    
  }

  protected function getResFolder() {
    return \Andou\Instantwin::app()->getBasePath() . self::$_res_folder;
  }

  protected function getLockFileName() {
    return $this->getResFolder() . self::$_lock_file;
  }

  protected function acquireLock() {
    
  }

  protected function releaseLock() {
    
  }

  /**
   * Restituisce il numero di giocate effettuate fino a questo momento
   */
  public function getPlaysCount() {
    return 100;
  }

  /**
   * Restituisce il vincite erogate fino a questo momento
   */
  public function getCurrentWinCount() {
    return 5;
  }

}
