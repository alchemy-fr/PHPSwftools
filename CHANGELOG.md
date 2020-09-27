CHANGELOG
---------

* 5.0.0 (dd-mm-yyyy)

  * Drop PHP 7.0 support and support 7.1+.
  * Allow phpunit 7, 8, 9
  * Fix PHP "continue" syntax error

* 4.1.0 (25-04-2018)

  * Drop PHP 5.x support and support 7.0+.
  * Upgrade `alchemy/binary-driver`
  * Upgrade `phpunit/phpunit` to 6
  * Drop PHP 5.x from the test suite.
  * Use `silex/silex` 2.x instead of 1.x
  * Use `pimple/pimple` 3.x instead of 1.x

* 0.3.2 (07-11-2017)

  * Drop PHP 5.3 from the test suite.
  * PHRAS-1696 fix -s options applying.

* 0.3.1 (07-03-2013)

  * Ensure that exceptions thrown are in SwfTools namespace.
  * Remove Monolog as a dependency.

* 0.3.0 (06-25-2013)

  * BC Break : FlashFile and PDFFile are now services.
  * BC Break : Simplification of service provider configuration.

* 0.2.1 (04-23-2013)

  * Code cleanup
  * Use a dedicated TestCase for all unit tests
  * Documentation API update

* 0.2.0 (04-22-2013)

  * Add support for underlying processes timeout.
  * Deprecate the use of Pdf2Swf::toSwf `$timelimit` parameter

* 0.1.1 (02-11-2013)

  * Adjust composer dependencies with tilde operator, allow larger range of versions.

* 0.1.0 (12-21-2012)

  * First stable version.
