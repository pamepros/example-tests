<?php
// To run this test, install Sausage (see http://github.com/jlipps/sausage-bun
// to get the curl one-liner to run in this directory), then run:
//     vendor/bin/phpunit SauceTest.php

require_once "vendor/autoload.php";

class AndroidChromeTest extends Sauce\Sausage\WebDriverTestCase
{
    protected $numValues = array();

    public static $browsers = array(
        // run Chrome locally on phone
        /*
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
         */
        // run Chrome locally
        array(
            'browserName' => 'chrome',
            'local' => true,
            'sessionStrategy' => 'shared'
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
    

    public function testSauce()
    {
        $this->url('http://google.com');
        $q = $this->elemsByName('q');
        $q[0]->value('Sauce Labs');
        $buttons = $this->elemsByTag('button');
        $buttons[0]->click();
        $links = $this->elemsByTag('a');
        $this->assertTextPresent('saucelabs.com');
    }
    
    public function testSauceInTitle()
    {
        $this->url('http://google.com');
        $q = $this->elemsByName('q');
        $q[0]->value('Sauce Labs');
        $buttons = $this->elemsByTag('button');
        echo $this->title();
        $this->assertContains("sauce", $this->title());
    }}
