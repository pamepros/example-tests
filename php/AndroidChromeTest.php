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
        $q = $this->elemsByName('q');
        $q[0]->value('Sauce Labs');
    }

    public function tearDown()
    {
        $this->stop();
    }

    public function testSauce()
    {
        $buttons = $this->elemsByTag('button');
        $buttons[0]->click();
        
        $this->assertTextPresent('saucelabs.com');
    }
    
    public function testSauceInTitle()
    {
        $buttons = $this->elemsByTag('button');
        echo $this->title();
        $this->assertContains("google", $this->title());
    }
}
