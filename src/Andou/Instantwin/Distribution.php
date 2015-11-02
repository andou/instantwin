<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Distribution
 *
 * @author andou
 */
class Distribution {

  /**
   * Restituisce indicazione sulle probabilità di vincita sulla base di:
   * - giocate effettuate
   * - vincite erogate
   * - tempo rimanente
   * 
   * @return type
   */
  public function getOdds() {
    $win_remaining = $this->getEstimatedWinRemaining();
    $estimatedRemainingPlays = $this->getEstimatedRemainingPlays();
    return ($win_remaining - $this->getCurrentWinCount()) / $estimatedRemainingPlays * $this->getVariance();
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////  DATI SULLE GIOCATE EFFETTUATE E STIME SULLE GIOCATE FUTURE   /////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /**
   * Restituisce la frazione di tempo ancora valida per erogare le vincite impostate
   * 
   * @return float
   */
  protected function getCompletionPercentage() {
    return \Andou\InstantWin::app()->getPlay()->getCompletionPercentage();
  }

  /**
   * Restituisce una stima delle giocate che ancora potranno essere piazzate prima delle fine del periodo stabilito
   * per l'assegnazione dei premi
   * 
   * @alert: Assume una distribuzione lineare delle giocate nel periodo indicato
   * 
   * @return float
   */
  protected function getEstimatedRemainingPlays() {
    $plays_count = $this->getPlaysCount();
    $estimatedRemainingPlays = ($plays_count / $this->getCompletionPercentage()) - $plays_count;
    $estimatedRemainingPlays = max(1, $estimatedRemainingPlays);
    return $estimatedRemainingPlays;
  }

  /**
   * Restituisce una stima del numero di vincite ancora da erogares
   * 
   * @return float
   */
  protected function getEstimatedWinRemaining() {
    $completion_percentage = $this->getCompletionPercentage();
    $win_remaining = $completion_percentage * $this->getMaxWin();
    return $win_remaining;
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////  VARIANTI IN ESECUZIONE   //////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /**
   * Fornisce il numero di vincite attualmente erogate
   * 
   * @return int
   */
  protected function getCurrentWinCount() {
    return \Andou\InstantWin::app()->getPlay()->getCurrentWinCount();
  }

  /**
   * Restituisce il numero di giocate fino a questo momento effettuate
   * 
   * @return int
   */
  protected function getPlaysCount() {
    return \Andou\InstantWin::app()->getPlay()->getPlaysCount();
  }

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////  CONFIGURAZIONI   //////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /**
   * Restituisce la varianza da impostrarsi nel determinare la probabilità di vincita
   * 
   * @return int
   */
  protected function getVariance() {
    return \Andou\Instantwin::app()->getConfig()->getDistributionVariance();
  }

  /**
   * Restituisce il numero massimo di vittore nel corso del periodo stabilito
   * 
   * @return int
   */
  protected function getMaxWin() {
    return \Andou\Instantwin::app()->getConfig()->getWinsMax();
  }

}
