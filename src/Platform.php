<?php

namespace Centretek\Environment;

class Platform {

  const ACQUIA = 'acquia';
  const PANTHEON = 'pantheon';
  const LANDO = 'lando';
  const OTHER = 'other';

  public static function getPlatform() {
    // Lando comes first, as the 'acquia' recipe has AH_SITE_ENVIRONMENT defined.
    if (getenv('LANDO_INFO')) {
      return static::LANDO;
    } elseif (defined('PANTHEON_ENVIRONMENT')) {
      return static::PANTHEON;
    } elseif (getenv('AH_SITE_ENVIRONMENT')) {
      return static::ACQUIA;
    } else {
      return static::OTHER;
    }
  }

}
