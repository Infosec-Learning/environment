<?php

namespace Centretek\Environment;

class Platform {

  const ACQUIA = 'acquia';
  const DDEV = 'ddev';
  const DOCKSAL = 'docksal';
  const PANTHEON = 'pantheon';
  const PLATFORM_SH = 'platform_sh';
  const LANDO = 'lando';
  const CONTEGIX = 'contegix';
  const AWS = 'aws';
  const OTHER = 'other';

  public static function getPlatform() {
    // Lando/DDEV comes first
    if (getenv('IS_DDEV_PROJECT') == 'true') {
      return static::DDEV;
    } elseif (getenv('LANDO_INFO')) {
      return static::LANDO;
    } elseif (getenv('DOCKSAL')) {
      return static::DOCKSAL;
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
