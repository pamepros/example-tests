<?php
// To run this test, install Sausage (see http://github.com/jlipps/sausage-bun
// to get the curl one-liner to run in this directory), then run:
//     vendor/bin/phpunit SauceTest.php

require_once "vendor/autoload.php";

class AndroidChromeTest extends Sauce\Sausage\MobileTestCase
{
    public static $browsers = array(
        // run Chrome locally on phone
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

    public function setUpPage()
    {
        $this->url('http://google.com');
    }

    public function tearDown()
    {
        $this->stop();
    }

    public function googleSearch($search_str)
    {
        $q = $this->elemsByName('q');
        $q[0]->value($search_str);
        $buttons = $this->elemsByTag('button');
        $buttons[0]->click();
    }

    public function testSauce()
    {
        $this->googleSearch('Sauce Labs'); 
        $this->assertTextPresent('saucelabs.com');
    }
    
    public function testSauceInTitle()
    {
        $this->googleSearch('Sauce Labs'); 
        $this->assertContains("Sauce", $this->title());
    }
}
