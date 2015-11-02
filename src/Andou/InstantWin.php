<?php

namespace Andou;

/**
 * Description of InstantWin
 *
 * @author andou
 */
class InstantWin {

  /**
   * Application model
   *
   * @var \Andou\Instantwin\App
   */
  static private $_app;

  /**
   *
   * @var string
   */
  static private $_config_file = "/../../configs/config.ini";

  /**
   * Get initialized application object.
   *
   * @return \Andou\Instantwin\App
   */
  public static function app() {
    if (null === self::$_app) {
      self::$_app = new \Andou\Instantwin\App();
      self::$_app->init(__DIR__, self::$_config_file);
    }
    return self::$_app;
  }

}