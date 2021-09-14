<?php

namespace Centretek\Environment;

class Environment {

  const PROD = 'prod';
  const STAGING = 'staging';
  const DEV = 'dev';
  const LOCAL = 'local';

  /**
   * @throws \Exception
   */
  public static function getEnvironment() {
    switch (Platform::getPlatform()) {
      case Platform::ACQUIA:
        switch ($_ENV['AH_SITE_ENVIRONMENT']) {
          case 'prod':
            return static::PROD;
          case 'test':
            return static::STAGING;
          default:
            return static::DEV;
        }
      case Platform::PANTHEON:
        switch ($_ENV['PANTHEON_ENVIRONMENT']) {
          case 'live':
            return static::PROD;
          case 'test':
            return static::STAGING;
          default:
            return static::DEV;
        }
      case Platform::PLATFORM_SH:
        switch ($_ENV['PLATFORM_ENVIRONMENT']) {
          case 'main':
          case 'master':
            return static::PROD;
          case 'stage':
          case 'staging':
          case 'test':
            return static::STAGING;
          default:
            return static::DEV;
        }
      case Platform::CONTEGIX:
        switch ($_ENV['CONTEGIX_ENVIRONMENT']) {
          case 'prod':
            return static::PROD;
          case 'test':
            return static::STAGING;
          default:
            return static::DEV;
        }
      case Platform::AWS:
        switch ($_ENV['AWS_ENVIRONMENT']) {
          case 'prod':
            return static::PROD;
          case 'test':
            return static::STAGING;
          default:
            return static::DEV;
        }
      case Platform::LANDO:
        return static::LOCAL;
      case Platform::OTHER:
        // @TODO CTEK_ENV maybe?
        break;
    }
    throw new \Exception('Unable to determine environment.');
  }

}