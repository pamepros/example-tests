Selenium &amp; Appium example tests
===================================

PHP
=============
Installation:

* We need to install the php-client library to run selenium tests, in this case we use the Sausage lib from Sauce Labs and we configure our Sauce Account following the instructions from:
    https://github.com/jlipps/sausage

// Remember to install composer inside the php/ folder in order to have the
vendor/ folder in there

* Run
```vendor/bin/phpunit <test-to-run>.php``` or just ```./test.sh <test-to-run>.php```
