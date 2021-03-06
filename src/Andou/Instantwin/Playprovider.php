<?php

namespace Andou\Instantwin;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author andou
 */
abstract class Playprovider {

  public function __construct() {
    $this->init();
  }

  /**
   * Inizializza la gestione delle giocate
   */
  public abstract function init();

  /**
   * Determina l'inizio di una giocata
   */
  public abstract function startPlay();

  /**
   * Determina la fine di una giocata
   */
  public abstract function endPlay();

  /**
   * Restituisce il numero di giocate effettuate fino a questo momento
   */
  public abstract function getPlaysCount();

  /**
   * Restituisce il vincite erogate fino a questo momento
   */
  public abstract function getCurrentWinCount();
}
