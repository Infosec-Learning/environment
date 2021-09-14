<?php

namespace Centretek\Environment;

class Platform {

  const ACQUIA = 'acquia';
  const PANTHEON = 'pantheon';
  const PLATFORM_SH = 'platform_sh';
  const LANDO = 'lando';
  const CONTEGIX = 'contegix';
  const AWS = 'aws';
  const OTHER = 'other';

  public static function getPlatform() {
    // Lando comes first, as the 'acquia' recipe has AH_SITE_ENVIRONMENT defined.
    if (getenv('LANDO_INFO')) {
      return static::LANDO;
    } elseif (defined('PANTHEON_ENVIRONMENT')) {
      return static::PANTHEON;
    } elseif (getenv('PLATFORM_PROJECT')) {
      return static::PLATFORM_SH;
    } elseif (getenv('AH_SITE_ENVIRONMENT')) {
      return static::ACQUIA;
    } elseif (getenv('CONTEGIX_ENVIRONMENT')) {
      return static::CONTEGIX;
    } elseif (getenv('AWS_ENVIRONMENT')) {
      return static::AWS;
    } else {
      return static::OTHER;
    }
  }

}
