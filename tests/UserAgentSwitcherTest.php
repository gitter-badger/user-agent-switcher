<?php

namespace bpteam\UserAgentSwitcher;

use \PHPUnit_Framework_Testcase;
use \ReflectionClass;

class UserAgentSwitcherTest extends PHPUnit_Framework_TestCase
{
    public static $name;

    public static function setUpBeforeClass()
    {
        self::$name = 'unit_test';
    }

    /**
     * @param        $name
     * @param string $className
     * @return \ReflectionMethod
     */
    protected static function getMethod($name, $className = 'bpteam\BigList\JsonList')
    {
        $class = new ReflectionClass($className);
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

    /**
     * @param        $name
     * @param string $className
     * @return \ReflectionProperty
     */
    protected static function getProperty($name, $className = 'bpteam\BigList\JsonList')
    {
        $class = new ReflectionClass($className);
        $property = $class->getProperty($name);
        $property->setAccessible(true);

        return $property;
    }

    public function testGetUserAgent()
    {
        $uas = new UserAgentSwitcher('bot');
        $googleBot = $uas->read('Googlebot/2.1');
        $this->assertEquals("Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)", $googleBot);

        $uas->open('desktop');
        $chromeLinux = $uas->read('Chrome 36 Lin');
        $this->assertEquals("Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36", $chromeLinux);
    }
}