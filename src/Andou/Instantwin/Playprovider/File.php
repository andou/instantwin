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
   * Inizializza la gestione delle giocate
   */
  public function init() {
    ;
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
