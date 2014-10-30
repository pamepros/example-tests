<?php
// To run this test, install Sausage (see http://github.com/jlipps/sausage-bun
// to get the curl one-liner to run in this directory), then run:
//     vendor/bin/phpunit SauceTest.php

require_once "vendor/autoload.php";

$creds = json_decode(file_get_contents('../pam-sauce-creds.json'),true);

define(SAUCE_HOST, $creds['USER'].':'.$creds['KEY'].'@ondemand.saucelabs.com');

class SauceTest extends PHPUnit_Extensions_AppiumTestCase
{
    protected $numValues = array();

    protected $base_url = 'http:/google.com';

    public static $browsers = array(
        array(
            'browserName' => 'Chrome',
            'name' => 'Test PHP on real device',
            'host' => SAUCE_HOST,
            'port' => 80,
            'desiredCapabilities' => array(
                'platformName' => 'Android',
                'deviceName' => 'Samsung Galaxy S4 Device',
                'appium-version'=> '1.2.2',
                'platformVersion' => '4.4'
            )
        )
    );

    public function setUp()
    {
        parent::setUp();
        $this->setBrowserUrl('http:/saucelabs.com/test/guinea-pig');
    }

    public function testTitle()
    {
        $this->assertContains("Google", $this->title());
    }

    public function testLink()
    {
        $link = $this->byId('i am a link');
        $link->click();
        $this->assertContains("I am another page title", $this->title());
    }
}
