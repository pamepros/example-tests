<?php
// To run this test, install Sausage (see http://github.com/jlipps/sausage-bun
// to get the curl one-liner to run in this directory), then run:
//     vendor/bin/phpunit SauceTest.php

require_once "vendor/autoload.php";

class SauceTest extends PHPUnit_Extensions_AppiumTestCase
{
    protected $numValues = array();

    protected $start_url = 'http://saucelabs.com/test/guinea-pig';
    
    public static $browsers = array(
        array(
            'name' => 'Test PHP on real device',
            'browserName' => 'Chrome',
            'seleniumServerRequestsTimeout' => 240,
            'desiredCapabilities' => array(
                'platformName' => 'Android',
                'deviceName' => 'Samsung Galaxy S4 Device',
                'appium-version'=> '1.2.2',
                'platformVersion' => '4.4'
            )
        )
    );

    public function testTitle()
    {
        $this->assertContains("I am a page title", $this->title());
    }
}
