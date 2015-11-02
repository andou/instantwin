<?php

namespace Andou\Instantwin;

/**
 * Description of Generator
 *
 * @author andou
 */
class Rand {

  /**
   * 
   * @return type
   */
  public function rand() {
    return $this->generateRandomFloat();
  }

  /**
   * 
   * @return type
   */
  private function generateRandomFloat() {
    return mt_rand(0, 1000000) / 1000000;
  }

}

