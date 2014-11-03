<?php
// To run this test, install Sausage (see http://github.com/jlipps/sausage-bun
// to get the curl one-liner to run in this directory), then run:
//     vendor/bin/phpunit SauceTest.php

require_once "vendor/autoload.php";

class SauceAndroidChromeTest extends Sauce\Sausage\WebDriverTestCase
{
    protected $numValues = array();

    // run chrome on a sauce labs phone
    public static $browsers = array(
        array(
            'name' => 'Test PHP on real device',
            'browserName' => 'Chrome',
            'desiredCapabilities' => array(
                'platformName' => 'Android',
                'deviceName' => 'Samsung Galaxy S4 Device',
                'appium-version'=> '1.2.2',
                'platformVersion' => '4.4'
            )
        )
    );

    public function elemsByTag($tag)
    {
        return $this->elements($this->using('tag name')->value($tag));
    }
    
    public function elemsByName($tag)
    {
        return $this->elements($this->using('name')->value($tag));
    }
    
    public function elemsById($tag)
    {
        return $this->elements($this->using('id')->value($tag));
    }

    public function setUp()
    {
        parent::setUp();
        $this->start_url = 'http://google.com';
    }

    public function testGoogleInTitle()
    {
        $this->assertContains("Google", $this->title());
    }

}
