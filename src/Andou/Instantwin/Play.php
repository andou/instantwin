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
    return 100;
  }

  /**
   * Restitusice il numero di vittorie fino a questo momento
   * 
   * @return int
   */
  public function getCurrentWinCount() {
    return 5;
  }

}
