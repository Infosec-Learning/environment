<?php

namespace Centretek\Environment;

class Platform {

  const ACQUIA = 'acquia';
  const PANTHEON = 'pantheon';
  const LANDO = 'lando';
  const OTHER = 'other';

  public static function getPlatform() {
    if (getenv('AH_SITE_ENVIRONMENT')) {
      return static::ACQUIA;
    } elseif (defined('PANTHEON_ENVIRONMENT')) {
      return static::PANTHEON;
    } elseif (getenv('LANDO_INFO')) {
      return static::LANDO;
    } else {
      return static::OTHER;
    }
  }

}