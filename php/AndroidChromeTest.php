<?php
// To run this test, install Sausage (see http://github.com/jlipps/sausage-bun
// to get the curl one-liner to run in this directory), then run:
//     vendor/bin/phpunit SauceTest.php

require_once "vendor/autoload.php";

class AndroidChromeTest extends PHPUnit_Extensions_AppiumTestCase
{
    protected $numValues = array();

    public static $browsers = array(
        array(
            'browserName' => 'Chrome',
            'local' => true,
            'port' => 4723,
            'desiredCapabilities' => array(
                'platformName' => 'Android',
                'platformVersion' => '4.4',
                'deviceName' => 'Android'
            )
        )
    );

    public function setUp()
    {
        parent::setUp();
    }

    public function testTitle()
    {
        $this->get('http://google.com');
        $this->assertContains("Google", $this->title());
    }
}
